@extends('front.layouts.master')
@section('title')
    تسجيل الدخول
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
                            <h1 class=""> تسجيل الدخول </h1>
                            <nav class="wow fadeInUp" data-wow-delay="0.25s">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}">الرئيسية</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        تسجيل الدخول
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
                                <form action="{{ route('user.login') }}" method="POST" >
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-12 mb-4">
                                            <label for="email"> البريد الالكتروني </label>
                                            <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}"
                                                placeholder="" required />
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="form-group col-12 mb-4 position-relative">
                                            <label for="password"> كلمة المرور </label>
                                            <input type="password" name="password" class="form-control" id="password"
                                                placeholder="" required />
                                            <span class="toggle-password" onclick="togglePassword()">
                                                👁️
                                            </span>
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
                                                تسجيل الدخول
                                            </button>
                                            <div id="msgSubmit" class="h3 text-left hidden"></div>
                                        </div>
                                    </div>
                                </form>
                                <hr>
                                <p class="or_login"> سجل من خلال </p>
                                <div class="social_login">
                                    <a href="#" class="google-btn">
                                        <div class="left">+ Google</div>
                                        <div class="right"><i>G+</i></div>
                                    </a>
                                </div>
                                <p class="or_register">
                                    ليس لدي حساب <a href="{{ route('user.register') }}"> حساب جديد </a>
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
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.querySelector('.toggle-password');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.textContent = '🙈'; // عين مغلقة
            } else {
                passwordInput.type = 'password';
                eyeIcon.textContent = '👁️'; // عين مفتوحة
            }
        }
    </script>
@endsection
