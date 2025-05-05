<?php

namespace App\Http\Controllers\front\auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Traits\Message_Trait;
use App\Http\Controllers\Controller;
use App\Http\Traits\Slug_Trait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    use Message_Trait;
    use Slug_Trait;

    public function login(Request $request)
    {

        if ($request->isMethod('post')) {
            $data = $request->all();

            $rules = [
                'email' => 'required|email|max:40',
                'password' => 'required|min:8',
                'g-recaptcha-response' => ['required', 'captcha']
            ];
            $messages = [
                'email.required' => 'من فضلك أدخل البريد الإلكتروني',
                'email.email' => 'صيغة البريد الإلكتروني غير صحيحة',
                'email.max' => 'البريد الإلكتروني يجب ألا يتجاوز 40 حرفًا',
                'password.required' => 'من فضلك أدخل كلمة المرور',
                'password.min' => 'كلمة المرور يجب أن تكون على الأقل 8 أحرف',
                'g-recaptcha-response.required' => ' من فضلك اكد انك لست روبوت',
                'g-recaptcha-response.captcha' => 'من فضلك اكد انك لست روبوت غير صحيح'
            ];
            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                return Redirect::back()->withInput()->withErrors($validator);
            }
            if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
                return redirect()->route('user.account');
            }
            return $this->error_message('البريد الإلكتروني أو كلمة المرور غير صحيحة');
        }
        if (Auth::check()) {
            return redirect()->route('user.account');
        }
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
            $username = $this->CustomeSlug($data['name']);
            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                return Redirect::back()->withInput()->withErrors($validator);
            }
            if(User::where('username',$username)->exists()){
                $username = $this->CustomeSlug($data['name'].rand(1,100));
            }
            $user = new User();
            $user->name = $data['name'];
            $user->username = $username;
            $user->email = $data['email'];
            $user->password = Hash::make($data['password']);
            $user->type = $data['account_type'];
            $user->save();
            Auth::login($user);
            return redirect()->route('user.account');
        }
        return view('front.auth.register');
    }
}
