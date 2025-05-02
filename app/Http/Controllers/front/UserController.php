<?php

namespace App\Http\Controllers\front;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\dashboard\Order;
use App\Http\Traits\Message_Trait;
use App\Http\Traits\Upload_Images;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\dashboard\CompanyProfile;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    use Message_Trait;
    use Upload_Images;
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
                'type' => 'required',
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
    ################# Confirm Data ###################
    public function confirm_data(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'name' => 'required',
                'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
                'commercial_license' => 'required|mimes:pdf,doc,docx,jpeg,png,jpg,gif,svg,webp',
                'signature_approval' => 'required|mimes:pdf,doc,docx,jpeg,png,jpg,gif,svg,webp',
                'identity_card' => 'required|mimes:pdf,doc,docx,jpeg,png,jpg,gif,svg,webp',
            ];
            $messages = [
                'name.required' => 'من فضلك ادخل اسم المستخدم ',
                'logo.required' => 'من فضلك ادخل لوجو الشركة ',
                'commercial_license.required' => 'من فضلك ادخل الرخصة التجارية ',
                'signature_approval.required' => 'من فضلك ادخل اعتماد التوقيع ',
                'identity_card.required' => 'من فضلك ادخل البطاقة الشخصية ',
                'logo.image' => 'من فضلك ادخل لوجو الشركة ',
                'logo.mimes' => ' لوجو الشركة يجب ان يكون من نوع jpeg,png,jpg,gif,svg,webp ',
                'commercial_license.mimes' => ' الرخصة التجارية يجب ان يكون من نوع pdf,doc,docx,jpeg,png,jpg,gif,svg,webp ',
                'signature_approval.mimes' => ' اعتماد التوقيع يجب ان يكون من نوع pdf,doc,docx,jpeg,png,jpg,gif,svg,webp ',
                'identity_card.mimes' => ' البطاقة الشخصية يجب ان يكون من نوع pdf,doc,docx,jpeg,png,jpg,gif,svg,webp ',
            ];
            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            if ($request->hasFile('logo')) {
                ########## Delete Old Logo
                $file_logo = $this->saveImage($request->logo, public_path('assets/uploads/companies/confirm_data/' . $user->id . '/logo'));
            }
            if ($request->hasFile('commercial_license')) {
                $file_commercial_license = $this->saveImage($request->commercial_license, public_path('assets/uploads/companies/confirm_data/' . $user->id . '/commercial_license'));
            }
            if ($request->hasFile('signature_approval')) {
                $file_signature_approval = $this->saveImage($request->signature_approval, public_path('assets/uploads/companies/confirm_data/' . $user->id . '/signature_approval'));
            }
            if ($request->hasFile('identity_card')) {
                $file_identity_card = $this->saveImage($request->identity_card, public_path('assets/uploads/companies/confirm_data/' . $user->id . '/identity_card'));
            }
            $company = $user->CompanyInfo;
            if (!$company) {
                $company = new CompanyProfile();
                $company->user_id = $user->id;
            }
            $company->name = $request->name;
            $company->logo = $file_logo;
            $company->commercial_license = $file_commercial_license;
            $company->signature_approval = $file_signature_approval;
            $company->identity_card = $file_identity_card;
            $company->save();
            return $this->success_message(' تم رفع البيانات الخاصة بك بنجاح من فضلك انتظر التفعيل من الادارة  ');
        }
        $user = User::with('CompanyInfo')->find(Auth::user()->id);
        // dd($user);

        return view('front.user.profile.confirm_data', compact('user'));
    }
}
