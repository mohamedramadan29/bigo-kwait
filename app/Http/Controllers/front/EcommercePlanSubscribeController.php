<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Traits\Message_Trait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\dashboard\EcommercePlan;
use App\Models\dashboard\EmployeRole;
use App\Models\front\EcommercePlanSubscribe;
use App\Models\User;

class EcommercePlanSubscribeController extends Controller
{
    use Message_Trait;
    public function store(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $data = $request->all();
        $plan = EcommercePlan::find($data['ecommerce_plan_id']);
        if (!$plan) {
            $this->error('الخطة غير موجودة');
        }
        $EcommercePlanSubscribe = new EcommercePlanSubscribe();
        $EcommercePlanSubscribe->user_id = Auth::user()->id;
        $EcommercePlanSubscribe->ecommerce_plan_id = $data['ecommerce_plan_id'];
        $EcommercePlanSubscribe->payment_id = null;
        $EcommercePlanSubscribe->price = $plan->price;
        $EcommercePlanSubscribe->duration = $plan->duration_days;
        $EcommercePlanSubscribe->start_date = now();
        $EcommercePlanSubscribe->end_date = now()->addDays($plan->duration_days);
        $EcommercePlanSubscribe->status = 1;
        $EcommercePlanSubscribe->save();
        ############### Add Permissions #################
        $role = EmployeRole::where('permission_type', 'store')->first();
        //  dd($role);
        $user->role_id = $role->id;
        $user->save();
        return $this->success_message('تم الاشتراك في الخطة بنجاح');
    }
}
