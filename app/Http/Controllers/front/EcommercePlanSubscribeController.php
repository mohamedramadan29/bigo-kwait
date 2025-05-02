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
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Support\Facades\Session;

class EcommercePlanSubscribeController extends Controller
{
    // الخطوة 1: بدء الدفع
    public function initiatePayment(Request $request)
    {
        $plan = EcommercePlan::findOrFail($request->ecommerce_plan_id);

        Session::put('paypal_plan', [
            'id' => $plan->id,
            'price' => $plan->price,
            'duration' => $plan->duration_days,
        ]);

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $token = $provider->getAccessToken();
        $provider->setAccessToken($token);

        $order = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('user.ecommerce.subscribe.paypal.success'),
                "cancel_url" => route('user.ecommerce.subscribe.paypal.cancel'),
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => number_format($plan->price, 2)
                    ]
                ]
            ]
        ]);

        foreach ($order['links'] as $link) {
            if ($link['rel'] === 'approve') {
                return redirect()->away($link['href']);
            }
        }

        return redirect()->back()->with('error_message', 'فشل إنشاء الطلب.');
    }

    // الخطوة 2: بعد نجاح الدفع
    public function paypalSuccess(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);

        if ($response['status'] === 'COMPLETED') {
            $planData = Session::get('paypal_plan');
            if (!$planData) {
                return redirect()->route('user.ecommerce.plans')->with('error_message', 'الخطة غير موجودة في الجلسة.');
            }

            $plan = EcommercePlan::find($planData['id']);
            if (!$plan) {
                return redirect()->route('user.ecommerce.plans')->with('error_message', 'الخطة غير متوفرة.');
            }

            $subscribe = new EcommercePlanSubscribe();
            $subscribe->user_id = Auth::id();
            $subscribe->ecommerce_plan_id = $plan->id;
            $subscribe->payment_id = $response['id'];
            $subscribe->price = $plan->price;
            $subscribe->duration = $plan->duration_days;
            $subscribe->start_date = now();
            $subscribe->end_date = now()->addDays($plan->duration_days);
            $subscribe->status = 1;
            $subscribe->save();

            // تعيين صلاحية المتجر
            $role = EmployeRole::where('permission_type', 'store')->first();
            if ($role) {
                $user = User::find(Auth::user()->id);
                $user->role_id = $role->id;
                $user->save();
            }

            Session::forget('paypal_plan');

            return redirect()->route('user.ecommerce.mysubscribe')->with('Success_message', 'تم الاشتراك بنجاح.');
        }

        return redirect()->route('user.ecommerce.plans')->with('error_message', 'فشل الدفع.');
    }

    // الخطوة 3: عند الإلغاء
    public function paypalCancel()
    {
        Session::forget('paypal_plan');
        return redirect()->route('user.ecommerce.plans')->with('error_message', 'تم إلغاء الدفع.');
    }
}
