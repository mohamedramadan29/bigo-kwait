<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CouponRequest;
use App\Http\Traits\Message_Trait;
use App\Models\dashboard\Coupon;
use App\Models\dashboard\Store;
use Illuminate\Http\Request;

class CouponController extends Controller
{

    use Message_Trait;
    public function index()
    {
        $coupons = Coupon::latest()->get();
        $stores = Store::with('User')->where('status',1)->get();
        return view('dashboard.coupons.index', compact('coupons','stores'));
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
        $coupon = new Coupon();
        $coupon->create([
            'store_id' => $data['store_id'],
            'code' => $data['code'],
            'discount_percentage' => $data['discount_percentage'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
            'limit' => $data['limit'],
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
        $stores = Store::where('status',1)->get();
        return view('dashboard.coupons.edit', compact('coupon','stores'));
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
