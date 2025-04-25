@extends('dashboard.layouts.app')
@section('title', ' ادارة المحافظات ')
@section('css')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/admin') }}/vendors/css/forms/toggle/bootstrap-switch.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin') }}/vendors/css/forms/toggle/switchery.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin') }}/css-rtl/plugins/forms/switch.css">
@endsection
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="mb-2 content-header-left col-md-6 col-12 breadcrumb-new">
                    <h3 class="mb-0 content-header-title d-inline-block"> ادارة المحافظات </h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard.welcome') }}">الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item active"> ادارة المحافظات
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
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#add_goverate"> اضافة محافظة </button>
                                @include('dashboard.world._add_goverate')
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">

                                    <form action="{{ url()->current() }}" method="GET">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <input type="text" name="keyword" class="form-control" placeholder="بحث">
                                            </div>
                                            <div class="col-lg-3">
                                                <button type="submit" name="" id="search"
                                                    class="btn btn-primary"> بحث </button>
                                            </div>
                                        </div>
                                    </form>
                                    <br>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th> الاسم </th>
                                                    <th> الدولة </th>

                                                    <th> عدد المستخدمين </th>
                                                    <th> الحالة </th>

                                                    <th> سعر الشحن </th>
                                                    <th> العمليات </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($governorates as $gov)
                                                    <tr>
                                                        <th scope="row">{{ $loop->iteration }}</th>
                                                        <td> <a href="#"> {{ $gov->name }}
                                                            </a></td>
                                                        <td> {{ $gov['country']->name }} </td>
                                                        <td>
                                                            <span class="badge badge-warning">
                                                                {{ $gov->Users->count() }}
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="badge {{ $gov->getActive() == 'مفعل' ? 'badge-success' : 'badge-danger' }}"
                                                                id="status_{{ $gov->id }}"> {{ $gov->getActive() }}
                                                            </span>
                                                        </td>

                                                        <td>{{ $gov->price }}</td>
                                                        <td>
                                                            <button type="button" class="btn btn-primary btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#update_goverate_{{ $gov->id }}"> <i
                                                                    class="la la-edit"></i> </button>
                                                            <button type="button" class="btn btn-danger btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#delete_governorate_{{ $gov->id }}"> <i
                                                                    class="la la-trash"></i> </button>
                                                        </td>
                                                    </tr>
                                                    @include('dashboard.world._delete_goverate')
                                                    @include('dashboard.world._update_goverate')
                                                @empty
                                                    <td colspan="4"> لا يوجد بيانات </td>
                                                @endforelse
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

@endsection
