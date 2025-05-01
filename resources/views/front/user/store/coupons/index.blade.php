@extends('front.user-layouts.app')
@section('title', ' ادارة الكوبونات ')
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
                    <h3 class="mb-0 content-header-title d-inline-block"> ادارة الكوبونات </h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('user.account') }}">الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item active"> ادارة الكوبونات
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
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#createcoupon">
                                    اضافة كوبون
                                </button>

                                @include('front.user.store.coupons._create')

                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="yajra_datatable"
                                            class="table table-striped table-bordered column-rendering">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th> الكود </th>
                                                    <th> النسبة المخفضة </th>
                                                    <th> البدء </th>
                                                    <th> الانتهاء </th>
                                                    <th> الحالة </th>
                                                    <th> الحد </th>
                                                    <th> عدد الاستخدام </th>
                                                    <th> العمليات </th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($coupons as $coupon)
                                                    <tr>
                                                        <th> {{ $loop->iteration }} </th>
                                                        <th> {{ $coupon->code }} </th>
                                                        <th> {{ $coupon->discount_percentage }} </th>
                                                        <th> {{ $coupon->start_date }} </th>
                                                        <th> {{ $coupon->end_date }} </th>
                                                        <th> {{ $coupon->status() }} </th>
                                                        <th> {{ $coupon->limit }} </th>
                                                        <th> {{ $coupon->time_used }} </th>
                                                        <th>
                                                            <button type="button" class="btn btn-primary"
                                                                data-toggle="modal"
                                                                data-target="#editcoupon{{ $coupon->id }}">
                                                                تعديل
                                                            </button>
                                                            <button type="button" class="btn btn-danger"
                                                                data-toggle="modal"
                                                                data-target="#deletecoupon{{ $coupon->id }}">
                                                                حذف
                                                            </button>
                                                            @include('front.user.store.coupons._edit')
                                                            @include('front.user.store.coupons._delete')
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

@section('js')

    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>

    {{-- <script src="https://cdn.datatables.net/buttons/3.2.2/js/dataTables.buttons.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/3.2.2/js/buttons.html5.min.js"></script> --}}
    <!--------- Show Model If Have Error Validations -->


    @if ($errors->any())
        <script>
            $(document).ready(function() {
                $("#createcoupon").modal('show');
            });
        </script>
    @endif

@endsection
