<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\dashboard\Setting;
use App\Models\dashboard\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreSettingController extends Controller
{
    public function update(Request $request)
    {
        $store = Store::with('setting')->where('user_id',Auth::user()->id)->first();
        if($request->isMethod('post')){
        }
        return view('front.user.store.setting.update',compact('store'));
    }
}
