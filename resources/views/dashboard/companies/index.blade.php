@extends('dashboard.layouts.app')
@section('title', ' ادارة الشركات ')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="mb-2 content-header-left col-md-6 col-12 breadcrumb-new">
                    <h3 class="mb-0 content-header-title d-inline-block"> ادارة الشركات </h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard.welcome') }}">الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item active"> ادارة الشركات
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
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped" id="DataTables_Table_0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th> الاسم </th>
                                                    <th> البريد الالكتروني </th>
                                                    <th> رقم الهاتف </th>
                                                    <th> اللوجو </th>
                                                    <th> حالة التفعيل </th>
                                                    <th> العمليات </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($companies as $company)
                                                    <tr>
                                                        <th scope="row">{{ $loop->iteration }}</th>
                                                        <td> {{ $company->name }} </td>
                                                        <td>
                                                            {{ $company->email }}
                                                        </td>
                                                        <td>
                                                            {{ $company->phone }}
                                                        </td>

                                                        <td>
                                                            @if ($company->CompanyInfo)
                                                                <img width="80px" height="80px" src="{{ asset('assets/uploads/companies/confirm_data/' . $company->id . '/logo/' . $company->CompanyInfo->logo) }}" alt="">
                                                            @endif
                                                        </td>
                                                        <td>
                                                            {{ $company->status == 1 ? 'مفعل' : 'غير مفعل' }}
                                                        </td>
                                                        <td>
                                                            <a class="btn btn-info btn-sm"
                                                                href="{{ route('dashboard.companies.update', $company->id) }}"><i
                                                                    class="la la-edit"></i> تعديل </a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <td colspan="8"> لا يوجد بيانات في الوقت الحالي </td>
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
