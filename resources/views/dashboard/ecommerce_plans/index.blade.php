@extends('dashboard.layouts.app')
@section('title', ' ادارة خطط التجارة الالكترونية ')
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
                    <h3 class="mb-0 content-header-title d-inline-block"> ادارة خطط التجارة الالكترونية </h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard.welcome') }}">الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item active"> ادارة خطط التجارة الالكترونية
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
                                    data-target="#createplan">
                                    اضافة خطة
                                </button>

                                @include('dashboard.ecommerce_plans._store')

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
                                                    <th> الوصف </th>
                                                    <th> السعر </th>
                                                    <th> عدد الايام </th>
                                                    <th> الحالة </th>
                                                    <th> العمليات </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($plans as $plan)
                                                    <tr>
                                                        <th>{{ $loop->iteration }}</th>
                                                        <th> {{ $plan->name }} </th>
                                                        <th> {{ $plan->type }} </th>
                                                        <th> {{ $plan->description }} </th>
                                                        <th> {{ $plan->price }} $ </th>
                                                        <th> {{ $plan->duration_days }} يوم  </th>
                                                        <th> {{ $plan->getStatus() }} </th>
                                                        <td>
                                                            <button type="button" class="btn btn-primary btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#update_plan_{{ $plan->id }}">
                                                                تعديل <i class="la la-edit"></i>
                                                            </button>
                                                            @include('dashboard.ecommerce_plans._update')
                                                        </td>
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
    @if ($errors->any())
        <script>
            $(document).ready(function() {
                $("#createbrand").modal('show');
            });
        </script>
    @endif

@endsection
