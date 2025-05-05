@extends('dashboard.layouts.app')

@section('title', ' تحديث بيانات الشركة ')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="mb-2 content-header-left col-md-6 col-12 breadcrumb-new">
                    <h3 class="mb-0 content-header-title d-inline-block"> الشركات </h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard.welcome') }}">الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('dashboard.companies.index') }}"> الشركات </a>
                                </li>
                                <li class="breadcrumb-item active"><a href="#"> تحديث بيانات الشركة </a>
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
                                    <h4 class="card-title" id="basic-layout-form"> تحديث بيانات الشركة </h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>

                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form" method="POST"
                                            action="{{ route('dashboard.companies.update', $company->id) }}"
                                            autocomplete="off">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name"> الاسم </label>
                                                            <input readonly disabled type="text" id="name"
                                                                class="form-control" placeholder="" name="name"
                                                                value="{{ $company->name }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="email"> البريد الالكتروني </label>
                                                            <input readonly disabled type="email" id="email"
                                                                class="form-control" placeholder="" name="email"
                                                                value="{{ $company->email }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="phone"> رقم الهاتف </label>
                                                            <input readonly disabled type="text" id="phone"
                                                                class="form-control" placeholder="" name="phone"
                                                                value="{{ $company->phone }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="created_at"> تاريخ التسجيل </label>
                                                            <input readonly disabled type="text" id="created_at"
                                                                class="form-control" placeholder="" name="created_at"
                                                                value="{{ $company->created_at->format('Y-m-d') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name"> اسم الشركة </label>
                                                            <input type="text" id="name" readonly disabled
                                                                class="form-control" placeholder="" name="name"
                                                                value="{{ $companyInfo->name ?? '' }}">
                                                        </div>
                                                    </div>



                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="logo"> لوجو الشركة </label>
                                                            <input readonly disabled type="file" id="logo"
                                                                class="form-control" placeholder="" name="logo">
                                                            @if ($companyInfo)
                                                            <br>
                                                                <a style="color: red" href="{{ asset('assets/uploads/companies/confirm_data/' . $company->id . '/logo/' . $companyInfo->logo) }}"
                                                                    target="_blank">
                                                                    مشاهدة اللوجو
                                                                </a>
                                                            @else
                                                                لا يوجد
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="commercial_license"> الرخصة التجارية </label>
                                                            <input readonly disabled type="file" id="commercial_license"
                                                                class="form-control" placeholder=""
                                                                name="commercial_license">
                                                            @if ($companyInfo)
                                                            <br>
                                                                <a style="color: red" href="{{ asset('assets/uploads/companies/confirm_data/' . $company->id . '/commercial_license/' . $companyInfo->commercial_license) }}"
                                                                    target="_blank">
                                                                    مشاهدة الرخصة التجارية
                                                                </a>
                                                            @else
                                                                لا يوجد
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="signature_approval"> اعتماد التوقيع </label>
                                                            <input readonly disabled type="file" id="signature_approval"
                                                                class="form-control" placeholder=""
                                                                name="signature_approval">
                                                            @if ($companyInfo)
                                                            <br>
                                                                <a style="color: red" href="{{ asset('assets/uploads/companies/confirm_data/' . $company->id . '/signature_approval/' . $companyInfo->signature_approval) }}"
                                                                    target="_blank">
                                                                    مشاهدة اعتماد التوقيع
                                                                </a>
                                                            @else
                                                                لا يوجد
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="identity_card"> البطاقة الشخصية </label>
                                                            <input readonly disabled type="file" id="identity_card"
                                                                class="form-control" placeholder="" name="identity_card">
                                                            @if ($companyInfo)
                                                            <br>
                                                                <a style="color: red" href="{{ asset('assets/uploads/companies/confirm_data/' . $company->id . '/identity_card/' . $companyInfo->identity_card) }}"
                                                                    target="_blank">
                                                                    مشاهدة البطاقة الشخصية
                                                                </a>
                                                            @else
                                                                لا يوجد
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="status"> حالة الشركة </label>
                                                            <select name="status" id="status" class="form-control">
                                                                <option value="1" {{ $company->status == 1 ? 'selected' : '' }}>مفعل</option>
                                                                <option value="0" {{ $company->status == 0 ? 'selected' : '' }}>غير مفعل</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> تعديل حالة الشركة
                                                </button>
                                            </div>
                                        </form>
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
