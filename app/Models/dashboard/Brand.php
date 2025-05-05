<?php

namespace App\Models\dashboard;

use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Brand extends Model
{
    use Sluggable;
    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function Products()
    {
        return $this->hasMany(Product::class, 'brand_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeInActive($query)
    {
        return $query->where('status', 0);
    }

    public function getStatus()
    {
        return $this->status == 1 ? 'مفعل' : 'غير مفعل';

    }
    public function Store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }


    // public function getCreatedAtAttribute($value)
    // {
    //     return date('d/m/Y h:i A', strtotime($value));
    // }

    ######### Get Logo Accessories With FullPath

    public function getImage()
    {
        return asset('assets/uploads/'. $this->store_id . '/brands/' . $this->logo);
    }
}
