<?php

namespace App\Models\dashboard;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{


    use HasFactory;

    protected $table = 'products';
    protected $guarded = [];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    #############################
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    ###########################
    // public function ProductImages()
    // {
    //     return $this->hasMany(ProductImage::class);
    // }
    #########################
    public function ProductPreviews()
    {
        return $this->hasMany(ProductPreviews::class);
    }
    #################
    public function images(){
        return $this->hasMany(ProductImage::class,'product_id');
    }

    #######################
    public function Vartians()
    {
        return $this->hasMany(ProductVartiant::class, 'product_id');
    }

    ####################
    public function IsSimple()
    {
        return !$this->has_variant;
    }
    ####################
    public function getCreatedAtAttribute($value)
    {
        return date('d/m/Y h:i A', strtotime($value));
    }
    ##################
    public function getUpdatedAtAttribute($value)
    {
        return date('d/m/Y h:i A', strtotime($value));
    }

    public function hasVariantTranslated(){
        return $this->has_variant == 1 ? 'متغير' : 'بسيط ';
    }


    public function getProductStatus(){
        return $this->status == 1 ? 'مفعل' : 'غير مفعل';
    }

    public function getPriceAttribute($value){
        return $this->has_variant == 0 ? number_format($value,2) : ' منتج متغير  ';
    }

    public function getQtyAttribute($value){
        return $this->has_variant == 0 ? $value : ' منتج متغير  ';
    }

}
