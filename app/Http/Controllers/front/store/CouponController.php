<?php

namespace App\Http\Controllers\front\store;

use Illuminate\Http\Request;
use App\Models\dashboard\Coupon;
use App\Http\Traits\Message_Trait;
use App\Http\Controllers\Controller;
use App\Http\Requests\CouponRequest;
use Illuminate\Support\Facades\Auth;

class CouponController extends Controller
{
    use Message_Trait;
    public function index()
    {
        $user  = Auth::user();
        $store = $user->Store;
        if (!$store) {
            return redirect()->route('user.store.index')->with('error', 'لا يوجد متجر مرتبط بحسابك');
        }
        $coupons = Coupon::where('store_id', $store->id)->latest()->get();
        return view('front.user.store.coupons.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CouponRequest $request)
    {
        $data = $request->all();
        $user  = Auth::user();
        $store = $user->Store;
        if (!$store) {
            return redirect()->route('user.store.index')->with('error', 'لا يوجد متجر مرتبط بحسابك');
        }

        $coupon = new Coupon();
        $coupon->create([
            'store_id' => $store->id,
            'code' => $data['code'],
            'discount_percentage' => $data['discount_percentage'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
            'limit' => $data['limit'],
           // 'time_used' => $data['time_used'],
            'is_active' => $data['is_active'],
        ]);
        return $this->success_message('تم اضافة الكوبون بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $coupon = Coupon::findOrFail($id);
        if (!$coupon) {
            abort(404);
        }
        return view('front.user.store.coupons.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CouponRequest $request, string $id)
    {
        $coupon = Coupon::findOrFail($id);
        if (!$coupon) {
            abort(404);
        }
        $data = $request->except('_token', '_method');
        $coupon->update($data);
        return $this->success_message('تم تعديل الكوبون  بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $coupon = Coupon::findOrFail($id);
        if (!$coupon) {
            abort(404);
        }
        $coupon->delete();
        return $this->success_message('تم حذف الكوبون بنجاح');
    }
}
