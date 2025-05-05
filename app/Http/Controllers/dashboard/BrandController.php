<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Http\Traits\Message_Trait;
use App\Http\Traits\Slug_Trait;
use App\Http\Traits\Upload_Images;
use App\Models\dashboard\Brand;
use App\Models\dashboard\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    use Message_Trait;
    use Upload_Images;
    use Slug_Trait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::latest()->get();
        $stores = Store::where('status', 1)->get();
        return view('dashboard.brands.index', compact('brands','stores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('logo')) {
            $filename = $this->saveImage($request->logo, public_path('assets/uploads/' . $data['store_id'] . '/brands'));
        }
        $brand = new Brand();
        $brand->store_id = $data['store_id'];
        $brand->name = $data['name'];
        $brand->status = $data['status'];
        $brand->logo = $filename;
        $brand->save();
        return $this->success_message(' تم اضافة العلامة التجارية بنجاح  ');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand = Brand::findOrFail($id);
        $stores = Store::where('status', 1)->get();
        return view('dashboard.brands.edit', compact('brand','stores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request, string $id)
    {
        $data = $request->all();
        $brand = Brand::findOrFail($id);
        $brand->update([
            'store_id' => $data['store_id'],
            'name' => $data['name'],
            'status' => $data['status']
        ]);
        if ($request->hasFile('logo')) {
            // Delete Old Logo
            $oldLogo = public_path('assets/uploads/' . $data['store_id'] . '/' . 'brands/' . $brand->logo);
            if (file_exists($oldLogo)) {
                @unlink($oldLogo);
            }
            $filename = $this->saveImage($request->logo, public_path('assets/uploads/' . $data['store_id'] . '/brands'));

            $brand->logo = $filename;
            $brand->save();
        }
        return $this->success_message(' تم تعديل العلامة التجارية بنجاح  ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::findOrFail($id);
        $store_id = $brand->store_id;
        if (!$brand) {
            abort(404);
        }
        // Delete Old Logo
        $oldLogo = public_path('assets/uploads/' . $store_id . '/' . 'brands/' . $brand->logo);
        if (file_exists($oldLogo)) {
            @unlink($oldLogo);
        }
        $brand->delete();
        return $this->success_message(' تم حذف العلامة التجارية  ');
    }
}
