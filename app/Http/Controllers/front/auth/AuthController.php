<?php

namespace App\Http\Controllers\front\auth;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

use function Ramsey\Uuid\v1;

class AuthController extends Controller
{
    use Message_Trait;

    public function login()
    {
        return view('front.auth.login');
    }
    public function register(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();

           // dd($data);

            $rules = [
                'account_type' => 'required|in:company,indv',
                'name' => 'required|string',
                'email' => 'required|email|max:40|unique:users,email',
                'password' => 'required|min:8',
                'confirm_password' => 'required|same:password',
                'g-recaptcha-response' => ['required', 'captcha']
            ];
            $messages = [
                'account_type.required' => 'من فضلك حدد نوع التسجيل',
                'account_type.in' => 'نوع الحساب يجب أن يكون شركة أو فرد فقط',
                'name.required' => 'من فضلك أدخل الاسم',
                'name.string' => 'من فضلك أدخل الاسم بشكل صحيح',
                'email.required' => 'من فضلك أدخل البريد الإلكتروني',
                'email.email' => 'صيغة البريد الإلكتروني غير صحيحة',
                'email.max' => 'البريد الإلكتروني يجب ألا يتجاوز 40 حرفًا',
                'email.unique' => 'هذا البريد الإلكتروني مسجل بالفعل',
                'password.required' => 'من فضلك أدخل كلمة المرور',
                'password.min' => 'كلمة المرور يجب أن تكون على الأقل 8 أحرف',
                'confirm_password.required' => 'يرجى تأكيد كلمة المرور',
                'confirm_password.same' => 'كلمتا المرور غير متطابقتين',
                'g-recaptcha-response.required' => ' من فضلك اكد انك لست روبوت',
                'g-recaptcha-response.captcha' => 'من فضلك اكد انك لست روبوت غير صحيح'
            ];
            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                return Redirect::back()->withInput()->withErrors($validator);
            }

            $user = new User();
            $user->name = $data['email'];
            $user->email = $data['email'];
            $user->password = Hash::make($data['password']);
            $user->type = $data['account_type'];
            $user->save();
            return $this->success_message(' تم تسجيل الحساب الخاص بك بنجاح  ');
        }
        return view('front.auth.register');
    }
}
