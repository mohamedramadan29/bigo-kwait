<?php

namespace App\Models\dashboard;

use App\Models\dashboard\Store;
use App\Models\dashboard\Product;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];
    public function Store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }

    public function getImage()
    {
        return asset('assets/uploads/' . $this->store_id . '/' . 'category_images/' . $this->image);
    }
    public function products()
    {
        return $this->hasMany(Product::class,'category_id');
    }
}
