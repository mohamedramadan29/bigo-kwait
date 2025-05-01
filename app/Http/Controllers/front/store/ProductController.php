<?php

namespace App\Http\Controllers\front\store;

use Illuminate\Http\Request;
use App\Http\Traits\Slug_Trait;
use App\Models\dashboard\Brand;
use App\Models\dashboard\Product;
use App\Http\Traits\Message_Trait;
use App\Http\Traits\Upload_Images;
use App\Models\dashboard\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\dashboard\ProductImage;
use App\Models\dashboard\ProductVartiant;

class ProductController extends Controller
{
    use Message_Trait;
    use Upload_Images;
    use Slug_Trait;

    public function index()
    {
        $user  = Auth::user();
        $store = $user->Store;
        $products = Product::where('store_id', $store->id)->latest()->get();
        return view('front.user.store.products.index', compact('products'));
    }

    public function create()
    {
        $user  = Auth::user();
        $store = $user->Store;
        $brands = Brand::where('store_id', $store->id)->get();
        $categories = Category::where('store_id', $store->id)->get();
        return view('front.user.store.products.create', compact('categories', 'brands'));
    }

    public function store(Request $request)
    {
        return view('front.user.store.products.create');
    }

    public function show($id)
    {
        $product = Product::where('id', $id)->first();
        return view('front.user.store.products.show', compact('product'));
    }

    public function destroy($id)
    {
        $user  = Auth::user();
        $store = $user->Store;
        $product = Product::where('id', $id)->where('store_id', $store->id)->first();
        if (!$product) {
            abort(404);
        }
        #### Delete Product Images
        $productImages  = ProductImage::where('product_id', $product->id)->get();
        foreach ($productImages as $image) {
            $imagePath = public_path('assets/uploads/product_images/' . $image->file_name);
            if (file_exists($imagePath)) {
                @unlink($imagePath);
            }
            $image->delete();
        }
        $product->delete();
        return $this->success_message('تم حذف المنتج بنجاح');
    }

    public function DeleteVartiant($vartiant_id){
        $vartiant = ProductVartiant::find($vartiant_id);
        $product = $vartiant->product;
        if($product->vartians()->count() == 1){
            return $this->Error_message(' لا يمكن حذف اخر متغير في المنتج  ');
        }
        $vartiant->delete();
        return $this->success_message('تم حذف المتغير بنجاح');

    }
}
