<?php

namespace App\Http\Controllers\front\store;

use Illuminate\Http\Request;
use App\Models\dashboard\Order;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class storeOrderController extends Controller
{
    public function index(){
        $orders = Order::where('store_id', Auth::user()->store->id)->get();
        return view('front.user.store.orders.index', compact('orders'));
    }
}
