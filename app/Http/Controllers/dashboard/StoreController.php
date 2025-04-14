<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Models\dashboard\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    use Message_Trait;
    public function index(){
        $stores = Store::all();
        return view('dashboard.stores.index',compact('stores'));
    }
}
