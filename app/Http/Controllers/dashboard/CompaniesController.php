<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Models\dashboard\CompanyProfile;
use App\Models\User;
use App\Notifications\SendConfirmEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CompaniesController extends Controller
{
    use Message_Trait;

    public function index()
    {
        $companies = User
            ::orderBy('id', 'desc')
            ->get();
        return view('dashboard.companies.index', compact('companies'));
    }
    public function update(Request $request, $id)
    {
        $company = User::find($id);
        $companyInfo = CompanyProfile::where('user_id', $id)->first();
        if ($request->isMethod('post')) {
            $data = $request->all();
            $status = $request->status;
            $company->status = $status;
            $company->save();

            ######## Send Email To User
            $user = User::find($id);
            Mail::send('mails.data-confirmed', compact('user'), function ($message) use ($user) {
                $message->to($user->email);
                $message->subject('تم تفعيل بيانات الشركة بنجاح');
            });
            return $this->success_message('تم تحديث الحالة بنجاح');
        }
        return view('dashboard.companies.update', compact('company', 'companyInfo'));
    }
}
