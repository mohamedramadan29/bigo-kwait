<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Traits\Slug_Trait;
use App\Models\dashboard\Store;
use Illuminate\Validation\Rule;
use App\Models\dashboard\Setting;
use App\Http\Traits\Message_Trait;
use App\Http\Traits\Upload_Images;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class StoreSettingController extends Controller
{
    use Slug_Trait;
    use Message_Trait;
    use Upload_Images;
    public function update(Request $request)
    {
        $store = Store::with('setting')->where('user_id', Auth::user()->id)->first();
        if ($request->isMethod('post')) {
            try {
                $data = $request->all();
                // Validate the data
                $rules = [
                    'name' => 'required|string|max:255',
                    'email' => ['required', 'email', 'max:255', Rule::unique('settings', 'email')],
                    'phone' => ['required', 'string', 'max:15', Rule::unique('settings', 'phone')],
                    'address' => 'required|string|max:255',
                    'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
                    'favicon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
                    'description' => 'nullable|string|max:1000',
                    'facebook' => 'nullable|url',
                    'twitter' => 'nullable|url',
                    'instagram' => 'nullable|url',
                    'youtube' => 'nullable|url',
                    'whatsapp' => 'nullable|string',
                    'snapchat' => 'nullable|string',
                    'tiktok' => 'nullable|string',
                ];
                if ($store && $store->setting) {
                    //$rules['slug'] = ['required', 'string', 'max:255', Rule::unique('stores', 'slug')->ignore($store->id)];
                    $rules['email'] = ['required', 'email', 'max:255', Rule::unique('settings', 'email')->ignore($store->setting->id)];
                    $rules['phone'] = ['required', 'string', 'max:15', Rule::unique('settings', 'phone')->ignore($store->setting->id)];
                }
                $messages = [
                    'name.required' => ' من فضلك ادخل اسم المطعم',
                    'name.string' => 'اسم المطعم يجب أن يكون نصًا',
                    'name.max' => 'اسم المطعم يجب أن لا يتجاوز 255 حرفًا',
                    'email.required' => ' من فضلك ادخل البريد الالكتروني',
                    'email.email' => 'البريد الالكتروني غير صحيح',
                    'email.max' => 'البريد الالكتروني يجب أن لا يتجاوز 255 حرفًا',
                    'email.unique' => 'البريد الالكتروني موجود مسبقًا',
                    'phone.required' => ' من فضلك ادخل رقم الهاتف',
                    'phone.string' => 'رقم الهاتف يجب أن يكون نصًا',
                    'phone.max' => 'رقم الهاتف يجب أن لا يتجاوز 15 حرفًا',
                    'phone.unique' => 'رقم الهاتف موجود مسبقًا',
                    'address.required' => ' من فضلك ادخل عنوان المطعم',
                    'address.string' => 'عنوان المطعم يجب أن يكون نصًا',
                    'address.max' => 'عنوان المطعم يجب أن لا يتجاوز 255 حرفًا',
                    'logo.image' => 'شعار المطعم يجب أن يكون صورة',
                    'logo.mimes' => 'شعار المطعم يجب أن يكون من نوع jpeg, png, jpg, gif, svg , webp',
                    'favicon.image' => 'بانر المطعم يجب أن يكون صورة',
                    'favicon.mimes' => 'بانر المطعم يجب أن يكون من نوع jpeg, png, jpg, gif, svg , webp',
                    'description.string' => 'وصف المطعم يجب أن يكون نصًا',
                    'description.max' => 'وصف المطعم يجب أن لا يتجاوز 1000 حرفًا',
                    'facebook.url' => 'رابط الفيسبوك غير صحيح',
                    'twitter.url' => 'رابط التويتر غير صحيح',
                    'instagram.url' => 'رابط الانستقرام غير صحيح',
                    'youtube.url' => 'رابط اليوتيوب غير صحيح',
                    'whatsapp.string' => 'واتساب يجب أن يكون نصًا',
                    'whatsapp.max' => 'واتساب يجب أن لا يتجاوز 15 حرفًا',
                    'snapchat.string' => 'سناب شات يجب أن يكون نصًا',
                    'snapchat.max' => 'سناب شات يجب أن لا يتجاوز 15 حرفًا',
                    'tiktok.string' => 'تيك توك يجب أن يكون نصًا',
                    'tiktok.max' => 'تيك توك يجب أن لا يتجاوز 15 حرفًا',
                ];
                $validator = Validator::make($data, $rules, $messages);
                if ($validator->fails()) {
                    return Redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
                }
                ###### Check If Store Is FoundOr Not
                $store = Store::firstOrCreate([
                    'user_id' => Auth::user()->id
                ], [
                    'name' => $request->name,
                    'description' => $request->description,
                    'slug' => $this->CustomeSlug($request->name),
                    //'status' => $request->status
                ]);
                ########### Update Or Add Setting
                $setting = Setting::where('store_id', $store->id)->first();

                Setting::updateOrCreate([
                    'store_id' => $store->id
                ], [
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'description' => $request->description,
                    'facebook' => $request->facebook,
                    'twitter' => $request->twitter,
                    'instagram' => $request->instagram,
                    'youtube' => $request->youtube,
                    'whatsapp' => $request->whatsapp,
                    'snapchat' => $request->snapchat,
                    'tiktok' => $request->tiktok,
                    'main_color' => $request->main_color,
                    'secondary_color' => $request->second_color
                ]);
                if ($request->hasFile('logo')) {
                    ##### Delete Old Image
                    $oldLogo = 'assets/uploads/logos/' . $setting['logo'];
                    //dd($oldLogo);
                    if (file_exists($oldLogo)) {
                        @unlink($oldLogo);
                    }
                    $filename = $this->saveImage($request->file('logo'), public_path('assets/uploads/logos/'));
                    $setting->logo = $filename;
                    $setting->save();
                }
                ######### favicon
                if ($request->hasFile('favicon')) {
                    ##### Delete Old Image
                    $oldfavicon = 'assets/uploads/favicons/' . $setting['favicon'];
                    //dd($oldLogo);
                    if (file_exists($oldfavicon)) {
                        @unlink($oldfavicon);
                    }
                    $faviconname = $this->saveImage($request->file('favicon'), public_path('assets/uploads/favicons/'));
                    $setting->favicon = $faviconname;
                    $setting->save();
                }
                return $this->success_message('تم تحديث الاعدادات بنجاح');
            } catch (\Exception $e) {
                return $this->exception_message($e);
            }
        }
        return view('front.user.store.setting.update', compact('store'));
    }
}
