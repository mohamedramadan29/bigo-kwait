<?php

namespace App\Http\Controllers\front\store;

use Illuminate\Http\Request;
use App\Http\Traits\Slug_Trait;
use App\Models\dashboard\Brand;
use App\Http\Traits\Message_Trait;
use App\Http\Traits\Upload_Images;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    use Message_Trait;
    use Upload_Images;
    use Slug_Trait;

    public function index()
    {
        $user  = Auth::user();
        $store = $user->Store;
        $brands = Brand::where('store_id', $store->id)->orderby('id', 'desc')->get();
        return view('front.user.store.brands.index', compact('brands'));
    }
    public function create(Request $request)
    {
        $user  = Auth::user();
        $store = $user->Store;
        if (!$store) {
            return redirect()->route('user.store.index')->with('error', 'لا يوجد متجر مرتبط بحسابك');
        }
        $store_id = $store->id;

        if ($request->isMethod('post')) {
            try {
                $alldata = $request->all();
                // Make Validation
                $rules = [
                    'name' => 'required',
                    'status' => 'required',
                    'image' => 'image|required|mimes:jpg,png,jpeg,webp',
                ];
                $customeMessage = [
                    'name.required' => 'من فضلك ادخل اسم القسم',
                    'status.required' => 'حدد حالة القسم ',
                    'image.mimes' =>
                    'من فضلك يجب ان يكون نوع الصورة jpg,png,jpeg,webp',
                    'image.image' => 'من فضلك ادخل الصورة بشكل صحيح',
                ];
                $validator = Validator::make($alldata, $rules, $customeMessage);
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                /// Upload Admin Photo
                if ($request->hasFile('image')) {
                    $file_name = $this->saveImage($request->image, public_path('assets/uploads/' . $store_id . '/brand_images'));
                }
                $new_brand = new Brand();
                $new_brand->name = $alldata['name'];
                $new_brand->slug = $this->CustomeSlug($alldata['name']);
                $new_brand->status = $alldata['status'];
                $new_brand->store_id = $store_id;
                $new_brand->logo = $file_name;
                $new_brand->save();
                return $this->success_message(' تمت اضافة العلامة التجارية بنجاح ');
            } catch (\Exception $e) {
                return $this->exception_message($e);
            }
        }
        return view('front.user.store.brands.store');
    }

    public function update(Request $request, $id)
    {
        $brand = Brand::findOrFail($id);
        $store = Auth::user()->Store;
        if ($store->id != $brand->store_id) {
            return abort(403);
            // return $this->error_message('لا يمكنك تعديل قسم ليس لك');
        }
        if ($request->isMethod('post')) {
            try {
                $alldata = $request->all();
                // Make Validation
                $rules = [
                    'name' => 'required',
                    'status' => 'required',
                ];
                if ($request->hasFile('image')) {
                    $rules['image'] = 'image|mimes:jpg,png,jpeg,webp';
                }
                $customeMessage = [
                    'name.required' => 'من فضلك ادخل اسم القسم',
                    'status.required' => 'حدد حالة القسم ',
                    'image.mimes' =>
                    'من فضلك يجب ان يكون نوع الصورة jpg,png,jpeg,webp',
                    'image.image' => 'من فضلك ادخل الصورة بشكل صحيح',
                ];
                $validator = Validator::make($alldata, $rules, $customeMessage);
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                /// Upload Category Image
                if ($request->hasFile('image')) {
                    ////// Delete Old Image
                    $old_image = 'assets/uploads/' . $store->id . '/' . 'brand_images/' . $brand['logo'];
                    if (file_exists($old_image)) {
                        @unlink($old_image);
                    }
                    $file_name = $this->saveImage($request->image, public_path('assets/uploads/' . $store->id . '/brand_images'));
                    $brand->update([
                        'logo' => $file_name,
                    ]);
                }
                $brand->update([
                    "name" => $alldata['name'],
                    "slug" => $this->CustomeSlug($alldata['name']),
                    "store_id" => $store->id,
                    "status" => $alldata['status'],
                ]);
                return $this->success_message(' تم تعديل العلامة التجارية بنجاح  ');
            } catch (\Exception $e) {
                return $this->exception_message($e);
            }
        }
        return view('front.user.store.brands.update', compact('brand'));
    }


    public function destroy($id)
    {

       // dd($id);
        try {
            // Find the main category
            $brand = Brand::findOrFail($id);
            $store = Auth::user()->Store;
            if ($store->id != $brand->store_id) {
                return abort(403);
                // return $this->error_message('لا يمكنك تعديل قسم ليس لك');
            }
            // Delete the main category image
            $old_image = public_path('assets/uploads/brand_images/' . $brand['logo']);
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            // Delete the main category
            $brand->delete();
            return $this->success_message('تم حذف العلامة التجارية بنجاح');
        } catch (\Exception $e) {
            return $this->exception_message($e);
        }
    }
}
