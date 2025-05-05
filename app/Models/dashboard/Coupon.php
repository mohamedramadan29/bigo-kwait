<?php

namespace App\Models\dashboard;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $guarded = [];

    public function getCreatedAtAttribute($value)
    {
        return date('d/m/Y h:i A', strtotime($value));
    }

    public function scopeValid($query)
    {
        return $query->where('is_active', 1)
            ->where('time_used', '<', 'limit')
            ->where('end_date', '>=', now());
    }

    public function scopeInvalid($query)
    {
        return $query->where('is_active', 0)
            ->orWhere('time_used', '>=', 'limit')
            ->orWhere('end_date', '<', now());
    }

    public function couponIsValid()
    {
        return $this->is_active == 1 && $this->time_used < $this->limit && $this->end_date > now();
    }

    public function status()
    {
        return $this->is_active == 1 ? 'مفعل' : 'غير مفعل';
    }

    public function Store(){
        return $this->belongsTo(Store::class,'store_id');
    }
}
