<?php

namespace App\Models\dashboard;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function details()
    {
        return $this->hasMany(OrderDetails::class, 'order_id', 'id');
    }
    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
