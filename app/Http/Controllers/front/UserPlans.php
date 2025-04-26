<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\front\EcommercePlanSubscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPlans extends Controller
{
    public function ecommercePlans()
    {
        $ecommercePlans = EcommercePlanSubscribe::with('ecommercePlan')->where('user_id', Auth::user()->id)->latest()->get();
        return view('front.user.plans.ecommerce', compact('ecommercePlans'));
    }
}
