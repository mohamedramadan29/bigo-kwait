<?php

namespace App\Models\dashboard;

use Illuminate\Database\Eloquent\Model;

class ProductPreviews extends Model
{

 
    protected $fillable = ['comment','stars','product_id','user_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
