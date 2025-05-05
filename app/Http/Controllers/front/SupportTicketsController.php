<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Traits\Message_Trait;
use App\Http\Traits\Upload_Images;
use App\Models\front\SupportTicket;
use App\Models\front\TicketMessage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use App\Models\front\SupportMessageFile;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class SupportTicketsController extends Controller
{
    use Message_Trait;
    use Upload_Images;
    public function index()
    {
        $tickets = SupportTicket::where('user_id', Auth::user()->id)->latest()->get();
        return view('front.user.support.tickets', compact('tickets'));
    }

    public function newTicket(Request $request)
    {
        if ($request->isMethod('post')) {
            $rules = [
                'subject' => 'required|string|max:255',
                'message' => 'required|string',
            ];
            $messages = [
                'subject.required' => 'العنوان مطلوب',
                'subject.max' => 'العنوان يجب أن يحتوي على 255 حرفًا أو أقل',
                'message.required' => 'الرسالة مطلوبة',
            ];
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            ####### Start Conversation Support Ticket
            try {
                $ticket = SupportTicket::create([
                    'user_id' => Auth::user()->id,
                    'sender_username' => Auth::user()->username,
                    'receiver_username' => 'support',
                    'ticket_subject' => $request->subject,
                    'last_message' => $request->message,
                    'last_time_message' => now(),
                    'is_read' => false,
                    'is_closed' => false,
                ]);
                ####### Insert First Message In Support chat ########
                TicketMessage::create([
                    'ticket_id' => $ticket->id,
                    'sender_username' => Auth::user()->username,
                    'receiver_username' => 'support',
                    'message' => $request->message,
                    'is_read' => false,
                ]);
            } catch (\Exception $e) {
                return $this->exception_message($e);
            }
            return redirect()->back()->with('success', 'تم إضافة التذكرة بنجاح');
        }
    }
    public function showTicket($id)
    {
        $ticket = SupportTicket::find($id);
        if (!$ticket) {
            abort(404);
        }
        if (Auth::user()->id != $ticket->user_id) {
            abort(403);
        }
        $messages = TicketMessage::with('files')->where('ticket_id', $id)->get();
        return view('front.user.support.ticket-show', compact('ticket', 'messages'));
    }

    ########### Send New Message ############
    public function sendMessage(Request $request, $id)
    {
        $ticket = SupportTicket::findOrFail($id);
        if (Auth::user()->id != $ticket->user_id) {
            abort(403);
        }
        $data = $request->all();
        $rules = [
            'message' => 'required|string',
            'files.*' => 'nullable|file|mimes:jpg,png,pdf,doc,docx|max:2048',
        ];
        $messages = [
            'message.required' => 'من فضلك ادخل رسالتك',
            'message.string' => 'من فضلك ادخل نص الرسالة بشكل صحيح',
            'files.*.mimes' => 'نوع الملف غير مدعوم، يرجى رفع صور أو مستندات (jpg, png, pdf, doc, docx)',
            'files.*.max' => 'حجم الملف يتجاوز الحد الأقصى (2 ميجابايت)',
        ];
        $validator = Validator::make($data, $rules, $messages);
        if ($validator->fails()) {
            return Redirect()->back()->withInput()->withErrors($validator);
        }

        ###### Insert Message
        TicketMessage::create([
            'ticket_id' => $ticket->id,
            'sender_username' => Auth::user()->username,
            'receiver_username' => 'support',
            'message' => $request->message,
            'is_read' => false,
        ]);
        $ticket->update([
            'last_message' => $request->message,
            'last_time_message' => now(),
        ]);
        ###### Insert Files Message #########

        #### Is Request has File
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $filename = $this->saveImage($file, public_path('assets/uploads/support_tickets/'));
                SupportMessageFile::create([
                    'ticket_message_id' => $ticket->id,
                    'file' => $filename,
                ]);
            }
        }

        return $this->success_message('تم اضافة رسالتك بنجاح');
    }
    ########### End Send Message ###########
}
