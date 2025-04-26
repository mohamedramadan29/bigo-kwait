@extends('front.user-layouts.app')
@section('title', ' خططي في التجارة الالكترونية ')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.min.css">
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.2/css/buttons.dataTables.min.css"> --}}

    <style>
        .dt-layout-row {
            display: flex;
            justify-content: space-between
        }
    </style>

@endsection
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="mb-2 content-header-left col-md-6 col-12 breadcrumb-new">
                    <h3 class="mb-0 content-header-title d-inline-block"> خطط التجارة الالكترونية </h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('user.account') }}">الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item active"> خطط التجارة الالكترونية
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-6 col-12">

                </div>
            </div>
            <div class="content-body">

                <!-- Bordered striped start -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">


                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="yajra_datatable"
                                            class="table table-striped table-bordered column-rendering">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th> الاسم </th>
                                                    <th> نوع الخطة </th>
                                                    <th> السعر </th>
                                                    <th> تاريخ الاشتراك </th>
                                                    <th> تاريخ انتهاء الاشتراك </th>
                                                    <th> الحالة </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($ecommercePlans as $plan)
                                                    <tr>
                                                        <th>{{ $loop->iteration }}</th>
                                                        <th> {{ $plan->ecommercePlan->name }} </th>
                                                        <th>
                                                            @if ($plan->ecommercePlan->type == 'store')
                                                                <span> متجر الكتروني </span>
                                                            @elseif($plan->ecommercePlan->type == 'payment_gateway')
                                                                <span> وسيلة الدفع </span>
                                                            @elseif($plan->ecommercePlan->type == 'shipping_service')
                                                                <span> وسيلة الشحن </span>
                                                            @endif
                                                        </th>
                                                        <th> {{ $plan->ecommercePlan->price }} $ </th>
                                                        <th> {{ date('Y-m-d', strtotime($plan->start_date)) }} </th>
                                                        <th> {{ date('Y-m-d', strtotime($plan->end_date)) }} </th>
                                                        <th>
                                                            @if ($plan->status == 1)
                                                                <span class="badge badge-success">نشط</span>
                                                            @else
                                                                <span class="badge badge-danger">غير نشط</span>
                                                            @endif
                                                        </th>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Bordered striped end -->
            </div>
        </div>
    </div>


@endsection
