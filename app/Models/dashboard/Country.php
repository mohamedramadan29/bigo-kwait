<?php

namespace App\Models\dashboard;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name','phone_code','is_active','store_id'];
    public $timestamps = false;

    public function governorates()
    {
        return $this->hasMany(GovernRate::class,'country_id');
    }

    public function Users(){
        return $this->hasMany(User::class,'country_id');
    }

    public function getActive(){
        return $this->is_active ? 'مفعل' : 'غير مفعل';
    }
}
