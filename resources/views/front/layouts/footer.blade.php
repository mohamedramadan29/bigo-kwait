<!-- Footer Start -->
<footer class="main-footer">
<!-- زر واتساب ثابت -->
<a href="https://wa.me/{{ $setting->whatsapp }}"
    class="whatsapp-float"
    target="_blank"
    title="تواصل معنا عبر واتساب">
     تواصل معنا  <i class="bi bi-whatsapp"></i>
 </a>
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <!-- Mega Footer Start -->
                <div class="mega-footer">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <!-- Footer About Start -->
                            <div class="footer-about">
                                <figure>
                                    <img src="{{ $setting->getLogo() }}" alt="" />
                                </figure>
                                <p> منصة BioKWT – بوابتك الذكية للنجاح الرقمي </p>
                            </div>
                            <!-- Footer About End -->
                        </div>

                        <div class="col-lg-2 col-md-4">
                            <!-- Footer Links Start -->
                            <div class="footer-links">
                                <h2> روابط </h2>
                                <ul>
                                    <li><a href="{{ route('front.index') }}">الرئيسية </a></li>
                                    <li><a href="{{ url('/') }}#about-us"> من نحن </a></li>
                                    <li><a href="{{ url('/') }}#services"> خدماتنا </a></li>
                                    <li><a href="{{ url('/contact') }}">تواصل معنا </a></li>
                                </ul>
                            </div>
                            <!-- Footer Links End -->
                        </div>

                        <div class="col-lg-2 col-md-4">
                            <!-- Footer Links Start -->
                            <div class="footer-links">
                                <h2> تابعنا </h2>
                                <ul>
                                    @if ($setting->facebook != null)
                                        <li><a href="{{ $setting->facebook }}">فيسبوك </a></li>
                                    @endif
                                    @if ($setting->twitter != null)
                                        <li><a href="{{ $setting->twitter }}">تويتر </a></li>
                                    @endif
                                    @if ($setting->instagram != null)
                                        <li><a href="{{ $setting->instagram }}">انستجرام</a></li>
                                    @endif
                                    @if ($setting->youtube != null)
                                        <li><a href="{{ $setting->youtube }}">يوتيوب</a></li>
                                    @endif
                                    @if ($setting->whatsapp != null)
                                        <li><a href="{{ $setting->whatsapp }}">واتساب</a></li>
                                    @endif
                                    @if ($setting->snapchat != null)
                                        <li><a href="{{ $setting->snapchat }}">سنابشات</a></li>
                                    @endif
                                    @if ($setting->tiktok != null)
                                        <li><a href="{{ $setting->tiktok }}">تيكتوك</a></li>
                                    @endif

                                </ul>
                            </div>
                            <!-- Footer Links End -->
                        </div>

                        <div class="col-lg-2 col-md-4">
                            <!-- Footer Links Start -->
                            <div class="footer-links">
                                <h2> اتصل بنا </h2>
                                <ul>
                                    <li><a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a></li>
                                    <li><a href="tel:{{ $setting->phone }}">{{ $setting->phone }}</a></li>
                                </ul>

                            </div>
                            <!-- Footer Links End -->
                        </div>
                    </div>
                </div>
                <!-- Mega Footer End -->

                <!-- Copyright Footer Start -->
                <div class="footer-copyright">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <!-- Footer Copyright Content Start -->
                            <div class="footer-copyright-text">
                                <p> جميع الحقوق محفوظة @2025 لدي BigoKW </p>
                            </div>
                            <!-- Footer Copyright Content End -->
                        </div>
                        <div class="col-lg-6">
                            <!-- Footer Policy Links Start -->
                            <div class="footer-policy-links">
                                <ul>
                                    <li><a href="#"> سياسة الخصوصية </a></li>
                                    <li><a href="#"> سياسة الاستخدام </a></li>
                                    {{-- <li class="highlighted"><a href="#top">go to top</a></li> --}}
                                </ul>
                            </div>
                            <!-- Footer Policy Links End -->
                        </div>
                    </div>
                </div>
                <!-- Copyright Footer End -->
            </div>
        </div>
    </div>
<!-- WhatsApp Button Start -->
<style>
    .whatsapp-float {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background-color: #25d366;
        color: white;
        padding: 10px 15px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: bold;
        display: flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        z-index: 9999;
    }

    .whatsapp-float img {
        width: 20px;
        height: 20px;
    }
    </style>
