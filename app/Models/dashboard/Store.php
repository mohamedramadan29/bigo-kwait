<?php

namespace App\Models\dashboard;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'stores';
    protected $fillable = [
        "name",
        "description",
        "slug",
        "owner_id",
        "email",
        "phone",
        "address",
        "logo",
        'status',
        'banner'
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getLogo()
    {
        return asset('assets/uploads/' . $this->id . '/' . 'logo/' . $this->logo);
    }
    public function getBanner()
    {
        return asset('assets/uploads/' . $this->id . '/' . 'banners/' . $this->banner);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function Setting(){
        return $this->hasOne(Setting::class,'resturant_id');
    }
}
