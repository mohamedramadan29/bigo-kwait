<?php

namespace App\Models\front;

use App\Models\User;
use App\Models\dashboard\EcommercePlan;
use Illuminate\Database\Eloquent\Model;

class EcommercePlanSubscribe extends Model
{
    protected $fillable = [
        'user_id',
        'ecommerce_plan_id',
        'payment_status',
        'price',
        'payment_method',
        'transaction_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function ecommercePlan()
    {
        return $this->belongsTo(EcommercePlan::class);
    }


}
