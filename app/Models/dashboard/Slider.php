<?php

namespace App\Models\dashboard;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{

    protected $guarded = [];
    public function Store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }

    ######### Get Image Accessories With FullPath
    public function getImage()
    {
        return asset('assets/uploads/'. $this->store_id . '/sliders/' . $this->file_name);
    }
}
