<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Models\dashboard\Country;
use App\Models\dashboard\Store;
use App\Http\Traits\Message_Trait;
use App\Http\Controllers\Controller;
use App\Models\dashboard\Governrate;
use Illuminate\Support\Facades\Validator;

class ShippingController extends Controller
{
    use Message_Trait;

    public function index()
    {
        $countries = Country::with('governorates')->get();
        $stores = Store::where('status', 1)->get();
        return view('dashboard.world.countries', compact('countries','stores'));
    }

    public function storeCountry(Request $request)
    {

        try {
            $data = $request->all();
            // dd($data);
            $rules = [
                'name' => 'required|string',
                'phone_code' => 'required',
                'is_active' => 'required|boolean',
            ];
            $messages = [
                'name.required' => 'من فضلك ادخل اسم الدولة',
                'phone_code.required' => 'من فضلك ادخل الكود',
                'is_active.required' => 'من فضلك ادخل حالة الدولة',
                'is_active.boolean' => 'الحالة يجب ان تكون boolean',
            ];
            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $country = new Country();
            $country->store_id = $data['store_id'];
            $country->name = $data['name'];
            $country->phone_code = $data['phone_code'];
            $country->is_active = $data['is_active'];
            $country->save();
            return $this->success_message('تم اضافة الدولة بنجاح');
        } catch (\Exception $e) {
            return $this->error_message($e->getMessage());
        }
    }

    public function updateCountry(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            try {
                $data = $request->all();
                $rules = [
                    'name' => 'required|string',
                    'phone_code' => 'required',
                    'is_active' => 'required|boolean',
                ];
                $messages = [
                    'name.required' => 'من فضلك ادخل اسم الدولة',
                    'phone_code.required' => 'من فضلك ادخل الكود',
                    'is_active.required' => 'من فضلك ادخل حالة الدولة',
                    'is_active.boolean' => 'الحالة يجب ان تكون boolean',
                ];
                $validator = Validator::make($data, $rules, $messages);
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                $country = Country::find($id);
                $country->name = $data['name'];
                $country->phone_code = $data['phone_code'];
                $country->is_active = $data['is_active'];
                $country->save();
                return $this->success_message('تم تحديث الدولة بنجاح');
            } catch (\Exception $e) {
                return $this->error_message($e->getMessage());
            }
        }
    }

    public function destroyCountry($id)
    {
        try {
            $country = Country::find($id);
            if (!$country) {
                return $this->error_message('الدولة غير موجودة');
            }
            $country->delete();
            return $this->success_message('تم حذف الدولة بنجاح');
        } catch (\Exception $e) {
            return $this->error_message($e->getMessage());
        }
    }

    #####################
    # Start Governorate Controller
    #####################

    public function indexGovernorate($country_id)
    {
        $country = Country::find($country_id);
        if (!$country) {
            return $this->error_message('الدولة غير موجودة');
        }
        $governorates = Governrate::where('country_id', $country_id)->get();
        return view('dashboard.world.governorates', compact('governorates', 'country'));
    }

    public function storeGovernorate(Request $request, $country_id)
    {
        $country = Country::find($country_id);
        if (!$country) {
            return $this->error_message('الدولة غير موجودة');
        }
        if ($request->isMethod('post')) {
            try {
                $data = $request->all();
                $rules = [
                    'name' => 'required|string',
                    'price' => 'required|numeric',
                    'is_active' => 'required|boolean',
                ];
                $messages = [
                    'name.required' => 'من فضلك ادخل اسم المحافظة',
                    'price.required' => 'من فضلك ادخل السعر',
                    'price.numeric' => 'السعر يجب ان يكون رقم',
                    'is_active.required' => 'من فضلك ادخل حالة المحافظة',
                    'is_active.boolean' => 'الحالة يجب ان تكون boolean',
                ];
                $validator = Validator::make($data, $rules, $messages);
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                $governorate = new Governrate();
                $governorate->name = $data['name'];
                $governorate->country_id = $country->id;
                $governorate->price = $data['price'];
                $governorate->is_active = $data['is_active'];
                $governorate->save();
                return $this->success_message('تم اضافة المحافظة بنجاح');
            } catch (\Exception $e) {
                return $this->error_message($e->getMessage());
            }
        }
    }
    public function updateGovernorate(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            try {
                $data = $request->all();
                $rules = [
                    'name' => 'required|string',

                    'price' => 'required|numeric',
                    'is_active' => 'required|boolean',
                ];
                $messages = [
                    'name.required' => 'من فضلك ادخل اسم المحافظة',
                    'price.required' => 'من فضلك ادخل السعر',
                    'price.numeric' => 'السعر يجب ان يكون رقم',
                    'is_active.required' => 'من فضلك ادخل حالة المحافظة',
                    'is_active.boolean' => 'الحالة يجب ان تكون boolean',
                ];
                $validator = Validator::make($data, $rules, $messages);
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                $governorate = Governrate::find($id);
                $governorate->name = $data['name'];
                $governorate->price = $data['price'];
                $governorate->is_active = $data['is_active'];
                $governorate->save();
                return $this->success_message('تم تحديث المحافظة بنجاح');
            } catch (\Exception $e) {
                return $this->error_message($e->getMessage());
            }
        }
    }

    public function destroyGovernorate($id)
    {
        try {
            $governorate = Governrate::find($id);
            if (!$governorate) {
                return $this->error_message('المحافظة غير موجودة');
            }
            $governorate->delete();
            return $this->success_message('تم حذف المحافظة بنجاح');
        } catch (\Exception $e) {
            return $this->error_message($e->getMessage());
        }
    }

    #####################
    # End Governorate Controller
    #####################

    #####################
    # Start City Controller
    #####################
}
