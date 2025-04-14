<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Models\dashboard\PaymentTransaction;
use Illuminate\Http\Request;

class PaymentTransactionController extends Controller
{

    use Message_Trait;
    public function index(){
        $transactions = PaymentTransaction::all();
        return view('dashboard.payment_transactions.index',compact('transactions'));
    }

}
