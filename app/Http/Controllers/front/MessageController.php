<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Models\front\Contact;
use App\Http\Traits\Message_Trait;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\dashboard\MainContactMessage;
use App\Models\dashboard\MainSetting;
use App\Models\dashboard\Resturant;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    use Message_Trait;

    public function index()
    {
        return view("front.contact");
    }
    public function store(Request $request)
    {
        try {

            $data = $request->all();
            $rules = [
                'name' => 'required|string',
                'email' => 'required|email',
                'phone' => 'required',
                'subject' => 'required',
                'msg' => 'required|string',
                'g-recaptcha-response' => ['required', 'captcha']
            ];
            $messages = [
                'name.required' => ' من فضلك ادخل الاسم   ',
                'name.string' => ' من فضلك ادخل الاسم بشكل صحيح ',
                'email.required' => ' من فضلك ادخل البريد الالكتروني   ',
                'email.email' => ' من فضلك ادخل البريد الالكتروني بشكل صحيح ',
                'subject.required' => ' من فضلك ادخل عنوان الرسالة  ',
                'msg.required' => ' من فضلك ادخل الرسالة  ',
                'msg.string' => ' من فضلك ادخل نص الرسالة بشكل صحيح  ',
                'phone.required' => ' من فضلك ادخل رقم الهاتف  ',
                'g-recaptcha-response.required' => 'من فضلك قم بتأكيد أنك لست روبوتًا',
                'g-recaptcha-response.captcha' => 'فشل التحقق من reCAPTCHA، يرجى المحاولة مرة أخرى'
            ];
            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                return Redirect()->back()->withInput()->withErrors($validator);
            }
            DB::beginTransaction();
            $message = new MainContactMessage();
            $message->create([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'subject' => $data['subject'],
                'messages' => $data['msg'],
            ]);
            //////////// Send WhatsApp Message  To Admin ///////////////////
            DB::commit();
            ######## Send Notification To Admin
            $mainSetting  = MainSetting::first();
            $adminemail = $mainSetting->email;
            $messagedata = [
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'subject' => $data['subject'],
                'messages' => $data['msg'],
            ];
            Mail::send('mails.publicMessageNotification', compact('messagedata'), function ($message) use ($adminemail) {
                $message->to($adminemail);
                $message->subject(' رسالة تواصل جديدة من موقع Bigo  ');
            });
            return $this->success_message('  تم ارسال رسالتك بنجاح سوف نتواصل معك في اقرب وقت ممكن  ');
        } catch (\Exception $e) {
            return $this->exception_message($e);
        }
    }
}
