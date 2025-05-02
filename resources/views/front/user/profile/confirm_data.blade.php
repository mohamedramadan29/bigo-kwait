@extends('front.user-layouts.app')

@section('title', ' تأكيد بيانات الشركة ')

@section('content')
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
                                <li class="breadcrumb-item"><a href="{{ route('user.update_profile') }}"> حسابي </a>
                                </li>
                                <li class="breadcrumb-item active"><a href="#"> تأكيد بيانات الشركة </a>
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
                                    <h4 class="card-title" id="basic-layout-form"> حسابي </h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>

                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form" method="POST" action="{{ route('user.confirm_data') }}"
                                            autocomplete="off" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name"> اسم الشركة  </label>
                                                            <input required type="text" id="name"
                                                                class="form-control" placeholder="" name="name"
                                                                value="{{ $user->CompanyInfo->name ?? '' }}">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="logo"> لوجو الشركة  </label>
                                                            <input required type="file" id="logo"
                                                                class="form-control" placeholder="" name="logo">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="commercial_license"> الرخصة التجارية  </label>
                                                            <input required type="file" id="commercial_license"
                                                                class="form-control" placeholder="" name="commercial_license">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="signature_approval"> اعتماد التوقيع  </label>
                                                            <input required type="file" id="signature_approval"
                                                                class="form-control" placeholder="" name="signature_approval">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="identity_card"> البطاقة الشخصية  </label>
                                                            <input required type="file" id="identity_card"
                                                                class="form-control" placeholder="" name="identity_card">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> حفظ
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
