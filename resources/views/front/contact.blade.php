@extends('front.layouts.master')
@section('title')
    تواصل معنا
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
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Page Header Box Start -->
                        <div class="page-header-box">
                            <h1 class=""> تواصل معنا </h1>
                            <nav class="wow fadeInUp" data-wow-delay="0.25s">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}">الرئيسية</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        تواصل معنا
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

        <!-- Contact Information Section Start -->
        <div class="contact-information">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <!-- Contact Item Start -->
                        <div class="contact-item wow fadeInUp" data-wow-delay="0.25s">
                            <div class="contact-content">
                                <div class="contact-content-title">
                                    <h2> العنوان </h2>
                                    <a href="#"><img src="{{ asset('assets/front') }}/images/icon-location.svg"
                                            alt="" /></a>
                                </div>
                                <p> الكويت ، الكويت ،23232 </p>
                            </div>
                            <div class="contact-image">
                                <figure class="image-anime">
                                    <img src="images/contact-info-1.jpg" alt="" />
                                </figure>
                            </div>
                        </div>
                        <!-- Contact Item End -->
                    </div>

                    <div class="col-md-4">
                        <!-- Contact Item Start -->
                        <div class="contact-item wow fadeInUp" data-wow-delay="0.5s">
                            <div class="contact-content">
                                <div class="contact-content-title">
                                    <h2> اتصل بنا </h2>
                                    <a href="#"><img src="{{ asset('assets/front') }}/images/icon-phone.svg"
                                            alt="" /></a>
                                </div>
                                <p>{{ $setting->phone }}</p>
                            </div>
                            <div class="contact-image">
                                <figure class="image-anime">
                                    <img src="images/contact-info-2.jpg" alt="" />
                                </figure>
                            </div>
                        </div>
                        <!-- Contact Item End -->
                    </div>

                    <div class="col-md-4">
                        <!-- Contact Item Start -->
                        <div class="contact-item wow fadeInUp" data-wow-delay="0.75s">
                            <div class="contact-content">
                                <div class="contact-content-title">
                                    <h2> البريد الإلكتروني </h2>
                                    <a href="#"><img src="{{ asset('assets/front') }}/images/icon-mail.svg"
                                            alt="" /></a>
                                </div>
                                <p>{{ $setting->email }}</p>
                            </div>
                            <div class="contact-image">
                                <figure class="image-anime">
                                    <img src="images/contact-info-3.jpg" alt="" />
                                </figure>
                            </div>
                        </div>
                        <!-- Contact Item End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact Information Section End -->

        <!-- Contact Us Section Start -->
        <div class="contact-us">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <!-- Contact Details Section Start -->
                        <div class="contact-details">
                            <!-- Section Title Start -->
                            <div class="section-title">
                                <h3 class="wow fadeInUp"> تواصل معنا </h3>
                                <h2 class=""> ارسل لنا رسالتك وسوف نتواصل معك في اقرب وقت ممكن </h2>
                            </div>
                            <!-- Section Title End -->

                            <!-- Contact Details Body Start -->
                            <div class="contact-detail-body">
                                <h3 class="wow fadeInUp" data-wow-delay="0.5s"> تابعنا :</h3>
                                <ul class="wow fadeInUp" data-wow-delay="0.75s">
                                    @if ($setting->facebook != null)
                                        <li>
                                            <a href="{{ $setting->facebook }}"><i class="bi bi-facebook"></i></a>
                                        </li>
                                    @endif
                                    @if ($setting->twitter != null)
                                        <li>
                                            <a href="{{ $setting->twitter }}"><i class="bi bi-twitter-x"></i></a>
                                        </li>
                                    @endif

                                    @if ($setting->instagram != null)
                                        <li>
                                            <a href="{{ $setting->instagram }}"><i class="bi bi-instagram"></i></a>
                                        </li>
                                    @endif
                                    @if ($setting->youtube != null)
                                        <li>
                                            <a href="{{ $setting->youtube }}"><i class="bi bi-youtube"></i></a>
                                        </li>
                                    @endif
                                    @if ($setting->whatsapp != null)
                                        <li>
                                            <a href="{{ $setting->whatsapp }}"><i class="bi bi-whatsapp"></i></a>
                                        </li>
                                    @endif

                                    @if ($setting->snapchat != null)
                                        <li>
                                            <a href="{{ $setting->snapchat }}"><i class="bi bi-snapchat"></i></a>
                                        </li>
                                    @endif
                                    @if ($setting->tiktok != null)
                                        <li>
                                            <a href="{{ $setting->tiktok }}"><i class="bi bi-tiktok"></i></a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                            <!-- Contact Details Body End -->
                        </div>
                        <!-- Contact Details Section End -->
                    </div>

                    <div class="col-lg-6">
                        <div class="contact-form-box wow fadeInUp" data-wow-delay="0.5s">
                            <!-- Contact Form Start -->
                            <div class="contact-form">
                                <form id="contactForm" action="#" method="POST" data-toggle="validator">
                                    <div class="row">
                                        <div class="form-group col-12 mb-4">
                                            <input type="text" name="name" class="form-control" id="name"
                                                placeholder="الاسم" required />
                                            <div class="help-block with-errors"></div>
                                        </div>

                                        <div class="form-group col-12 mb-4">
                                            <input type="text" name="phone" class="form-control" id="phone"
                                                placeholder="رقم الهاتف" required />
                                            <div class="help-block with-errors"></div>
                                        </div>

                                        <div class="form-group col-12 mb-4">
                                            <input type="email" name="email" class="form-control" id="email"
                                                placeholder="البريد الالكتروني" required />
                                            <div class="help-block with-errors"></div>
                                        </div>

                                        <div class="form-group col-12 mb-4">
                                            <input type="text" name="subject" class="form-control" id="subject"
                                                placeholder="عنوان الرسالة" required />
                                            <div class="help-block with-errors"></div>
                                        </div>

                                        <div class="form-group col-12 mb-4">
                                            <textarea name="msg" class="form-control" id="msg" rows="7" placeholder="رسالتك" required></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>

                                        <div class="col-md-12">
                                            <button type="submit" class="btn-default">
                                                ارسال الرسالة
                                            </button>
                                            <div id="msgSubmit" class="h3 text-left hidden"></div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- Contact Form End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact Us Section End -->

        <!-- Google Map Section Start -->
        <div class="google-map wow fadeInUp" data-wow-delay="0.25s">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3484.3443932826685!2d48.123232684905396!3d29.154521982214764!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjnCsDA5JzE2LjMiTiA0OMKwMDcnMTUuOCJF!5e0!3m2!1sar!2seg!4v1746262317181!5m2!1sar!2seg"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <!-- Google Map Section End -->

    </div>
    <!-- Content / End -->
@endsection
