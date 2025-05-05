@extends('dashboard.layouts.app')
@section('title', ' تفاصيل التذكرة ')
@section('css')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/front/user-dashboard/') }}/css-rtl/pages/chat-application.css">
@endsection
@section('content')
    <div class="app-content content">
        <div class="content-right" style="width: 100%">
            <div class="content-wrapper">

                <div class="content-body">
                    <section class="chat-app-window">
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard.welcome') }}">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('dashboard.tickets.index') }}"> التذاكر </a>
                                </li>
                                <li class="breadcrumb-item active"> تفاصيل التذكرة </li>
                            </ol>
                        </div>
                        <div class="badge badge-default mb-1"> تفاصيل التذكرة </div>
                        <div class="chats">
                            <div class="chats">
                                @foreach ($messages as $message)
                                    <p class="time">{{ $message->created_at->diffForHumans() }}</p>
                                    <div class="chat @if ($message->sender_username == 'support') chat-left @endif">
                                        <div class="chat-avatar">
                                            <a class="avatar" data-toggle="tooltip" href="#" data-placement="left"
                                                title="" data-original-title="">
                                                @if ($message->sender_username == 'support')
                                                    <img src="{{ $setting->getLogo() }}" alt="avatar" />
                                                @else
                                                    <img src="{{ asset('assets/front/user-dashboard/images/avatar.png') }}"
                                                        alt="avatar" />
                                                @endif
                                            </a>
                                        </div>
                                        <div class="chat-body">
                                            <div class="chat-content">
                                                <p>{{ $message->message }}</p>
                                                @if ($message->Files->isNotEmpty())
                                                    @foreach ($message->Files as $file)
                                                        <a class="btn btn-warning btn-sm" href="{{ asset('assets/uploads/support_tickets/' . $file->file) }}"
                                                            target="_blank">
                                                            مشاهدة المرفق
                                                        </a>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                    <section class="chat-app-form">
                        <form class="chat-app-input d-flex" method="POST"
                            action="{{ route('dashboard.tickets.sendmessage', $ticket->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <fieldset class="form-group position-relative has-icon-left col-10 m-0">
                                <div class="form-control-position">
                                    <i class="icon-emoticon-smile"></i>
                                </div>
                                <input type="text" required class="form-control" name="message" id="iconLeft4"
                                    placeholder="اكتب رسالتك">
                                <div class="form-control-position control-position-right">
                                    <label for="fileInput">
                                        <i class="ft-image"></i>
                                    </label>
                                </div>
                                <!-- حقل رفع الملفات (مخفي) -->
                                <input type="file" id="fileInput" name="files[]" multiple style="display: none;"
                                    accept="image/*,.pdf,.doc,.docx">
                            </fieldset>
                            <fieldset class="form-group position-relative has-icon-left col-2 m-0">
                                <button type="submit" class="btn btn-info"><i class="la la-paper-plane-o d-lg-none"></i>
                                    <span class="d-none d-lg-block">إرسال</span>
                                </button>
                            </fieldset>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('assets/front/user-dashboard/') }}/js/scripts/pages/chat-application.js" type="text/javascript">
    </script>
@endsection
