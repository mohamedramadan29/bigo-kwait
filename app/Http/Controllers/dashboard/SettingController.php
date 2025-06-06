<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Traits\Message_Trait;
use App\Http\Traits\Upload_Images;
use Illuminate\Http\Request;
use App\Models\dashboard\Setting;
use App\Http\Controllers\Controller;
use App\Models\dashboard\MainSetting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    use Message_Trait;
    use Upload_Images;
    public function update(Request $request)
    {
        // Check if the user is authenticated
        if (!Auth::guard('admin')->check()) {
            return Redirect()->route('admin.login');
        }
        // Check if the user has the right permissions

        $setting = MainSetting::first();
        if (!$setting) {
            abort(404);
        }
        if ($setting->resturant_id != Auth::guard('admin')->user()->resturant_id) {
            abort(404);
        }
        if ($request->isMethod('post')) {
            try {
                $data = $request->all();
                // Validate the data
                $rules = [
                    'name' => 'required|string|max:255',
                    //'slug' => 'required|string|max:255|unique:settings,slug,' . $setting->id,
                    'email' => 'required|email|max:255|unique:settings,email,' . $setting->id,
                    'phone' => 'required|string|max:15|unique:settings,phone,' . $setting->id,
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
                $setting->name = $data['name'];
                //$setting->slug = $data['slug'];
                $setting->email = $data['email'];
                $setting->phone = $data['phone'];
                $setting->address = $data['address'];
                $setting->description = $data['description'];
                $setting->facebook = $data['facebook'];
                $setting->twitter = $data['twitter'];
                $setting->instagram = $data['instagram'];
                $setting->youtube = $data['youtube'];
                $setting->whatsapp = $data['whatsapp'];
                $setting->snapchat = $data['snapchat'];
                $setting->tiktok = $data['tiktok'];
                $setting->main_color = $data['main_color'];
                $setting->secondary_color = $data['second_color'];
                $setting->save();
                if ($request->hasFile('logo')) {
                    ##### Delete Old Image
                    if ($setting->logo != null) {
                        $oldLogo = 'assets/uploads/logos/' . $setting->logo;
                        //dd($oldLogo);
                        if (file_exists($oldLogo)) {
                            @unlink($oldLogo);
                        }
                    }
                    $filename = $this->saveImage($request->file('logo'), public_path('assets/uploads/logos/'));
                    $setting->logo = $filename;
                    $setting->save();
                }
                ######### favicon
                if ($request->hasFile('favicon')) {
                    ##### Delete Old Image
                    if ($setting->favicon != null) {
                        $oldfavicon = 'assets/uploads/favicons/' . $setting->favicon;
                        //dd($oldLogo);
                        if (file_exists($oldfavicon)) {
                            @unlink($oldfavicon);
                        }
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
        //  dd($setting);
        return view('dashboard.settings.update', compact('setting'));
    }
}
