<?php

namespace App\Http\Controllers\front;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\dashboard\Order;
use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    use Message_Trait;
    public function account()
    {
        return view("front.user.dashboard");
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('front.index');
    }
    #################### Update User Profile ###################
    public function update_profile(Request $request)
    {

        $user = User::find(Auth::user()->id);
        // dd($user);

        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'phone' => 'required|unique:users,phone,' . $user->id,
                'type'=>'required',
            ];
            $messages = [
                'name.required' => 'من فضلك ادخل اسم المستخدم ',
                'email.required' => 'من فضلك ادخل البريد الالكتروني ',
                'email.email' => 'من فضلك ادخل بريد الكتروني صحيح ',
                'phone.required' => 'من فضلك ادخل رقم الهاتف ',
                'type.required' => 'من فضلك ادخل نوع الحساب ',
            ];
            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->type = $request->type;
            $user->save();
            return $this->success_message('تم تحديث البيانات بنجاح');
        }

        return view('front.user.profile.update', compact('user'));
    }
    ################# Update Admin  Password ###################
    public function update_password(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'password' => 'required',
                'new_password' => 'required',
                'new_password_confirmation' => 'required|same:new_password',
            ];
            $messages = [
                'password.required' => 'يجب ادخال كلمة المرور القديمة',
                'new_password.required' => 'يجب ادخال كلمة المرور الجديدة',
                'new_password_confirmation.required' => 'يجب ادخال تاكيد كلمة المرور الجديدة',
                'new_password_confirmation.same' => 'كلمة المرور الجديدة غير متطابقة',
            ];
            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            if (!Hash::check($request->password, $user->password)) {
                return redirect()->back()->withErrors(['password' => 'كلمة المرور القديمة غير صحيحة']);
            }

            $user->password = bcrypt($request->new_password);
            $user->save();
            $this->success_message('تم تغيير كلمة المرور بنجاح');
            // return redirect()->route('dashboard.welcome')->with('success', 'تم تغيير كلمة المرور بنجاح');
        }

        return view('front.user.profile.password', compact('user'));
    }
}
