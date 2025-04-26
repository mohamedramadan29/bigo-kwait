<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Traits\Message_Trait;
use App\Http\Controllers\Controller;
use App\Models\dashboard\EcommercePlan;
use App\Http\Requests\EcommercePlanRequest;
use Illuminate\Support\Facades\Redis;

class EcommercePlansController extends Controller
{
    use Message_Trait;

    public function index()
    {
        $plans = EcommercePlan::latest()->get();
        return view('dashboard.ecommerce_plans.index', compact('plans'));
    }

    public function store(EcommercePlanRequest $request)
    {
        $data = $request->except('_token');
        EcommercePlan::create($data);
        return $this->success_message('تم اضافة الخطة بنجاح');
    }
    public function update(Request $request, $id)
    {
        $plan = EcommercePlan::findOrFail($id);
        $data = $request->except('_token');
        $plan->update($data);
        return $this->success_message('تم تعديل الخطة بنجاح');
    }
    // public function destroy($id)
    // {
    //     $plan = EcommercePlan::findOrFail($id);
    //     $plan->delete();
    //     return $this->success_message('تم حذف الخطة بنجاح');
    // }
}
