<?php

namespace App\Models\dashboard;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Governrate extends Model
{
    protected $fillable = ['name','country_id','is_active'];
    public $timestamps = false;


    public function country()
    {
        return $this->belongsTo(Country::class,'country_id');
    }


    public function cities(){
        return $this->hasMany(City::class,'governrate_id');
    }

    public function Users(){
        return $this->hasMany(User::class,'governrate_id');
    }

    public function getActive(){
        return $this->is_active ? 'مفعل' : 'غير مفعل';
    }

    public function ShippingPrice(){
        return $this->hasOne(Governrate::class,'governrate_id');
    }
}
