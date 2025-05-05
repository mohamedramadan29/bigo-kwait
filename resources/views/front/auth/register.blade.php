@extends('front.layouts.master')
@section('title')
    تسجيل حساب جديد
@endsection
@section('content')
    <!-- Content -->
    <div id="content">
        @if (Session::has('Success_message'))
            @php
                toastify()->success(\Illuminate\Support\Facades\Session::get('Success_message'));
            @endphp
        @endif
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                @php
                    toastify()->error($error);
                @endphp
            @endforeach
        @endif
        <!-- Section -->
        <!-- Page Header Start -->
        <div class="page-header" style="padding: 70px 0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Page Header Box Start -->
                        <div class="page-header-box">
                            <h1 class=""> سجل حسابك الان </h1>
                            <nav class="wow fadeInUp" data-wow-delay="0.25s">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}">الرئيسية</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        حساب جديد
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <!-- Page Header Box End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
        <!-- Contact Us Section Start -->
        <div class="contact-us login_form">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="contact-form-box wow fadeInUp" data-wow-delay="0.5s">
                            <!-- Contact Form Start -->
                            <div class="contact-form">
                                <form action="{{ route('user.register') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-12 mb-4">
                                            <label for="account_type"> حدد نوع التسجيل </label>
                                            <select name="account_type" id="account_type" class="form-select">
                                                <option value="" selected disabled> -- حدد نوع الحساب -- </option>
                                                <option value="company" @selected(old('account_type') == 'company')>شركة</option>
                                                <option value="indv" @selected(old('account_type') == 'indv')>فرد</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-12 mb-4">
                                            <label for="name"> الاسم </label>
                                            <input type="text" name="name" class="form-control" id="name"
                                                value="{{ old('name') }}" placeholder="" required />
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="form-group col-12 mb-4">
                                            <label for="email"> البريد الالكتروني </label>
                                            <input type="email" name="email" class="form-control" id="email"
                                                value="{{ old('email') }}" placeholder="" required />
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="form-group col-12 mb-4">
                                            <label for="password"> كلمة المرور </label>
                                            <input type="password" name="password" class="form-control" id="password" value="{{ old('password') }}"
                                                placeholder="" required />
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="form-group col-12 mb-4">
                                            <label for="confirm_password"> تاكيد كلمة المرور </label>
                                            <input type="password" name="confirm_password" class="form-control" value="{{ old('confirm_password') }}"
                                                id="confirm_password" placeholder="" required />
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="form-group col-12 mb-4 capatcha_section">
                                            {!! NoCaptcha::display() !!}
                                            @if ($errors->has('g-recaptcha-response'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn-default">
                                                تسجيل الحساب
                                            </button>
                                            <div id="msgSubmit" class="h3 text-left hidden"></div>
                                        </div>
                                    </div>
                                </form>
                                <hr>
                                <p class="or_login"> سجل من خلال </p>
                                <div class="social_login">
                                    <a href="{{ route('auth.google.redirect', 'google') }}" class="google-btn">
                                        <div class="left">+ Google</div>
                                        <div class="right"><i>G+</i></div>
                                    </a>
                                </div>
                                <p class="or_register">
                                    لديك حساب بالفعل <a href="{{ route('user.login') }}"> سجل دخول </a>
                                </p>
                            </div>
                            <!-- Contact Form End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact Us Section End -->

    </div>
    <!-- Content / End -->
@endsection
@section('js')
@endsection
