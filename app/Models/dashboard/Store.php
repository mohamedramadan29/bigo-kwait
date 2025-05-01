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
        "user_id",
        "status",
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function Setting()
    {
        return $this->hasOne(Setting::class, 'store_id');
    }
    public function getLogo()
    {
        return asset('assets/uploads/logos/' . $this->Setting->logo);
    }
    public function getFavicon()
    {
        return asset('assets/uploads/favicons/' . $this->Setting->favicon);
    }
}
