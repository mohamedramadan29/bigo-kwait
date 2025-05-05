@extends('dashboard.layouts.app')


@section('title', ' تذاكر الدعم الفني ')

@section('content')
    <style>
        .ticket-card {
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s;
        }

        .ticket-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .ticket-image {
            width: 50px;
            height: 50px;
            min-width: 50px;
            border-radius: 8px;
            overflow: hidden;
            background: #f8f9fa;
            margin-left: 20px;
        }

        .ticket-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .ticket-image .no-image {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #adb5bd;
            font-size: 12px;
            text-align: center;
            padding: 5px;
        }

        .ticket-info {
            flex: 1;
        }

        .ticket-title a {
            color: #2c3e50;
            text-decoration: none;
            font-weight: bold;
        }

        .ticket-title a:hover {
            color: #3498db;
        }

        .ticket-last-message {
            font-size: 14px;
            line-height: 1.5;
        }

        .ticket-meta {
            font-size: 13px;
        }

        .ticket-status .badge {
            padding: 8px 12px;
            border-radius: 20px;
            font-weight: 500;
            margin-left: 5px;
        }
    </style>
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="mb-2 content-header-left col-md-6 col-12 breadcrumb-new">
                    <h3 class="mb-0 content-header-title d-inline-block"> حسابي </h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('user.account') }}">الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item"><a href="#"> تذاكر الدعم الفني </a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>

            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form"> تذاكر الدعم الفني </h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>

                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        @forelse($tickets as $ticket)
                                            <div class="ticket-card mb-4">
                                                <div class="row align-items-center">
                                                    <div class="col-md-8">
                                                        <div class="d-flex align-items-center">
                                                            <div class="ticket-image">
                                                                <img src="{{ asset('assets/front/images/ticket.png') }}"
                                                                    alt="صورة التذكرة" class="img-fluid rounded">

                                                            </div>
                                                            <div class="ticket-info mr-3">
                                                                <h5 class="ticket-title mb-1">
                                                                    <a
                                                                        href="{{ route('dashboard.tickets.show', $ticket->id) }}">
                                                                        {{ $ticket->ticket_subject }}
                                                                    </a>
                                                                </h5>
                                                                <p class="ticket-last-message mb-1 text-muted">
                                                                    {{ Str::limit($ticket->last_message, 100) }}
                                                                </p>
                                                                <div class="ticket-meta">
                                                                    <span class="text-muted">
                                                                        <i class="la la-clock-o"></i>
                                                                        {{ $ticket->last_reply_at ? $ticket->last_reply_at->diffForHumans() : $ticket->created_at->diffForHumans() }}
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 text-md-left">
                                                        <div class="ticket-status">
                                                            @if ($ticket->is_closed == 0)
                                                                <span class="badge badge-success">مفتوحة</span>
                                                            @elseif($ticket->is_closed == 1)
                                                                <span class="badge badge-danger">مغلقة</span>
                                                            @else
                                                                <span class="badge badge-warning">قيد المعالجة</span>
                                                            @endif

                                                            @if ($ticket->is_read == 1)
                                                                <span class="badge badge-info">تم الرد</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="text-center py-5">
                                                <i class="la la-ticket la-3x text-muted" style="font-size: 50px"></i>
                                                <h4 class="mt-3">لا توجد تذاكر</h4>
                                                <p class="text-muted">قم بإنشاء تذكرة جديدة للتواصل مع فريق الدعم الفني</p>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>
@endsection
