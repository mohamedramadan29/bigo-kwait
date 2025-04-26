<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\dashboard\EcommercePlan;

class EcommercePlanController extends Controller
{
    public function index()
    {
        $plans = EcommercePlan::where('is_active', 1)->get();
        return view('front.user.ecommerce-plans.index', compact('plans'));
    }
}
