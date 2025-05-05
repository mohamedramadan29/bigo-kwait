<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use Illuminate\Http\Request;
use App\Models\dashboard\MainContactMessage;

class MainContactMessageController extends Controller
{
    use Message_Trait;
    public function index()
    {
        $messages = MainContactMessage::all();
        return view('dashboard.main_contact_message.index', compact('messages'));
    }

    public function show(Request $request, $id)
    {
        $message = MainContactMessage::find($id);

        if ($request->isMethod('post')) {
            $message->status = $request->status;
            $message->save();
            return $this->success_message('تم تحديث حالة الرسالة بنجاح  ');
        }
        return view('dashboard.main_contact_message.show', compact('message'));
    }

    public function delete(Request $request, $id)
    {
        $message = MainContactMessage::find($id);
        $message->delete();
        return $this->success_message('تم حذف الرسالة بنجاح  ');
    }
}
