<?php

namespace App\Models\dashboard;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class PaymentTransaction extends Model
{
    protected $table = 'payment_transactions';
    protected $fillable = [
        'user_id',
        'transaction_id',
        'amount',
        'status',
        'payment_method',
    ];
    public function User(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
