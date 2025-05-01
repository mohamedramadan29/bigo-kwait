<?php

namespace App\Http\Controllers\front\store;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Http\Traits\Slug_Trait;
use App\Http\Traits\Upload_Images;
use App\Models\dashboard\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class StoreBannersController extends Controller
{
    use Message_Trait;
    use Upload_Images;
    use Slug_Trait;

    public function index()
    {
        $sliders = Slider::where('store_id', Auth::user()->store->id)->get();
        return view('front.user.store.sliders.index', compact('sliders'));
    }

    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            try {
                $store_id = Auth::user()->store->id;

                $data = $request->all();

                $rules = [
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
                ];
                $messages = [
                    'image.required' => ' من فضلك ادخل الصورة',
                    'image.image' => ' من فضلك حدد الصورة بشكل صحيح  ',
                    'image.mimes' => ' الصورة يجب ان تكون من نوع jpeg,png,jpg,gif,svg,webp ',
                ];
                $validator = Validator::make($data, $rules, $messages);

                if ($validator->fails()) {
                    return Redirect::back()->withErrors($validator)->withInput();
                }
                if ($request->hasFile('image')) {
                    $file_name = $this->saveImage($request->image, public_path('assets/uploads/' . $store_id . '/sliders'));
                }
                $slider = new Slider();
                $slider->create([
                    'store_id' => $store_id,
                    'file_name' => $file_name,
                    'title' => $request->title,
                    'description' => $request->description,
                    'link' => $request->link,
                    'link_text' => $request->link_text,
                    'status' => $request->status,
                ]);
                return $this->success_message('تم اضافة العرض بنجاح');
            } catch (\Exception $e) {
                return $this->exception_message($e);
            }
        }
        return view('front.user.store.sliders.store');
    }
    public function update(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            try {
                $slider = Slider::findOrFail($id);
                $data = $request->all();
                $rules = [
                    'image' => 'image|nullable|mimes:jpg,png,jpeg,webp',
                ];
                $messages = [
                    'image.image' => ' من فضلك حدد الصورة بشكل صحيح  ',
                    'image.mimes' => ' الصورة يجب ان تكون من نوع jpeg,png,jpg,gif,svg,webp ',
                ];
                $validator = Validator::make($data, $rules, $messages);
                if ($validator->fails()) {
                   return Redirect::back()->withErrors($validator)->withInput();
                }
                if ($request->hasFile('image')) {
                    ####### Delete Old Image
                    $old_image = 'assets/uploads/' . $slider->store_id . '/sliders/' . $slider->file_name;
                    if (file_exists($old_image)) {
                        @unlink($old_image);
                    }
                    $file_name = $this->saveImage($request->image, public_path('assets/uploads/' . $slider->store_id . '/sliders'));
                $slider->update([
                    'file_name'=>$file_name,
                ]);
                }
                $slider->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'link' => $request->link,
                    'link_text' => $request->link_text,
                    'status' => $request->status,
                ]);
                return $this->success_message('تم تعديل العرض بنجاح');
            } catch (\Exception $e) {
                return $this->exception_message($e);
            }

        }
        $slider = Slider::where('id', $id)->where('store_id', Auth::user()->store->id)->first();
        return view('front.user.store.sliders.update', compact('slider'));
    }
    public function destroy($id)
    {
        try {
            $slider = Slider::where('id', $id)->where('store_id', Auth::user()->store->id)->first();
            if (!$slider) {
                abort(404);
            }
            ####### Delete Old Image
            $old_image = 'assets/uploads/' . $slider->store_id . '/sliders/' . $slider->file_name;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            $slider->delete();
            return $this->success_message('تم حذف العرض بنجاح');
        } catch (\Exception $e) {
            return $this->exception_message($e);
        }
    }
}
