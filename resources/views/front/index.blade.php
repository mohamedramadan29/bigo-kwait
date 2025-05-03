@extends('front.layouts.master')
@section('title')
    Bigo
@endsection
@section('content')
    <!-- Hero Section Start -->
    <div class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="hero-layout-2">
                        <!-- Hero Content Start -->
                        <div class="hero-content">
                            <!-- Section Title Start -->
                            <div class="section-title">
                                <h3 class="wow fadeInUp"> منصة BioKWT – بوابتك الذكية للنجاح الرقمي </h3>
                                <h1 class="wow fadeInUp">
                                    نساعد الأفراد والشركات على الانطلاق بأعمالهم إلى مستوى جديد من الاحترافية، من خلال خدمات
                                    متكاملة <span> تشمل إنشاء المتاجر الإلكترونية، الدعم الفني، حلول الشحن، وخدمة
                                        العملاء…</span> وأكثر!

                                </h1>
                            </div>
                            <!-- Section Title End -->
                            <!-- Hero Footer Start -->
                            <div class="hero-footer">
                                <a href="{{ route('user.login') }}" class="btn-default wow fadeInUp" data-wow-delay="0.75s"> سجل معنا الان
                                </a>
                            </div>
                            <!-- Hero Footer End -->
                        </div>
                        <!-- Hero Left Content End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Section End -->

    <!-- About Section Start -->
    <div class="about-us" id="about-us">
        <div class="container">
            <div class="row section-row align-items-center">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp"> عن الشركة </h3>
                        <h2 class="text-anime">
                            بوابتك الذكية للنجاح
                        </h2>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-lg-6">
                    <!-- About Us Content Start -->
                    <div class="about-content">
                        <p class="wow fadeInUp" data-wow-delay="0.25s">
                            نحن BioKWT، شركة متخصصة في تقديم حلول إلكترونية متكاملة للأفراد والشركات، نسعى إلى تمكين الشركات
                            من التواجد الرقمي القوي من خلال إنشاء متاجر إلكترونية خاصة، وتوفير خدمات احترافية تساعدهم على
                            النمو والتوسع بسهولة وفعالية.
                        </p>

                        <ul class="wow fadeInUp" data-wow-delay="1s">
                            <li> <i class="bi bi-arrow-left-circle-fill"></i> متجر إلكتروني احترافي </li>
                            <li> <i class="bi bi-arrow-left-circle-fill"></i> دعم فني متواصل </li>
                            <li> <i class="bi bi-arrow-left-circle-fill"></i> حلول متكاملة للشركات </li>
                            <li> <i class="bi bi-arrow-left-circle-fill"></i> توصيل الطلبات </li>
                            <li> <i class="bi bi-arrow-left-circle-fill"></i> موظفين متخصصين </li>
                            <li> <i class="bi bi-arrow-left-circle-fill"></i> تسويق رقمي احترافي </li>
                        </ul>

                        <a href="{{ route('contact') }}" class="btn-default wow fadeInUp" data-wow-delay="1.25s"> تواصل معنا الان </a>
                    </div>
                    <!-- About Us Content End -->
                </div>
                <div class="col-lg-6">
                    <!-- About Us Image Start -->
                    <div class="about-image">
                        <div class="about-img">
                            <figure class="image-anime reveal">
                                <img src="{{ asset('assets/front/') }}/images/about.gif" alt="" />
                            </figure>
                        </div>

                    </div>
                    <!-- About Us Image End -->
                </div>
            </div>
        </div>
    </div>
    <!-- About Section End -->


    <!-- Why Choose Us Section Start -->
    <div class="why-choose-us">
        <div class="container">
            <div class="row section-row align-items-center">
                <div class="col-lg-8 col-md-12">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp"> أهداف الشركة </h3>
                        <h2 class=""> نهدف إلى تقديم حلول رقمية مبتكرة وشاملة تساعد الأفراد والشركات على النمو والتوسع
                            باحترافية في العالم الرقمي. </h2>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-12">
                    <!-- Why Choose Item Start -->
                    <div class="why-choose-us-item wow fadeInUp" data-wow-delay="0.25s">
                        <div class="icon-box">
                            <img width="80" src="{{ asset('assets/front/') }}/images/user-interface.png"
                                alt="" />
                        </div>
                        <h3> تمكين التواجد الرقمي </h3>
                        <p>
                            نساعد الشركات على إنشاء متاجر إلكترونية احترافية تعكس هويتهم وتزيد من فرص نموهم في السوق الرقمي.
                        </p>
                    </div>
                    <!-- Why Choose Item End -->
                </div>

                <div class="col-lg-3 col-12">
                    <!-- Why Choose Item Start -->
                    <div class="why-choose-us-item wow fadeInUp" data-wow-delay="0.5s">
                        <div class="icon-box">
                            <img width="80" src="{{ asset('assets/front/') }}/images/service.png" alt="" />
                        </div>
                        <h3> توفير حلول متكاملة </h3>
                        <p>
                            نقدم باقة من الخدمات تشمل البرمجة، التسويق، الدعم الفني، وخدمة العملاء لضمان نجاح المشروع من
                            جميع النواحي.
                        </p>
                    </div>
                    <!-- Why Choose Item End -->
                </div>

                <div class="col-lg-3 col-12">
                    <!-- Why Choose Item Start -->
                    <div class="why-choose-us-item wow fadeInUp" data-wow-delay="0.75s">
                        <div class="icon-box">
                            <img width="80" src="{{ asset('assets/front/') }}/images/growth.png" alt="" />
                        </div>
                        <h3>دعم نمو الأعمال</h3>
                        <p>
                            نساهم في تنمية أعمال عملائنا من خلال أدوات ذكية وخطط قابلة للتوسع وتناسب مختلف القطاعات.
                        </p>
                    </div>
                    <!-- Why Choose Item End -->
                </div>

                <div class="col-lg-3 col-12">
                    <!-- Why Choose Item Start -->
                    <div class="why-choose-us-item wow fadeInUp" data-wow-delay="0.75s">
                        <div class="icon-box">
                            <img width="80" src="{{ asset('assets/front/') }}/images/morning-routine.png"
                                alt="" />
                        </div>
                        <h3> تسهيل العمليات اليومية </h3>
                        <p>
                            من خلال خدمات مثل التوصيل، وإدارة الطلبات، والمتابعة التقنية، نجعل تجربة التشغيل أسهل وأكثر
                            كفاءة.
                        </p>
                    </div>
                    <!-- Why Choose Item End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Why Choose Us Section End -->

    <!-- Our Services Section Start -->
    <div class="our-services" id="services">
        <div class="container">
            <div class="row section-row align-items-center">
                <div class="col-lg-7 col-12">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp"> خدماتنا </h3>
                        <h2 class="wow fadeInUp"> نقدم مجموعة متكاملة من الخدمات الرقمية المصممة خصيصًا لدعم الأفراد
                            والشركات في بناء وتطوير أعمالهم عبر الإنترنت. </h2>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <!-- Service Item Start -->
                    <div class="service-item wow fadeInUp" data-wow-delay="0.25s">
                        <div class="service-content">
                            <div class="service-content-title">
                                <h2> إنشاء المتاجر الإلكترونية </h2>
                            </div>
                            <p>
                                نصمم ونطور متاجر إلكترونية احترافية متكاملة وسهلة الاستخدام تساعدك على عرض وبيع منتجاتك بكل
                                سهولة وأمان.
                            </p>
                        </div>
                        <div class="service-image">
                            <figure class="image-anime">
                                <img src="{{ asset('assets/front/') }}/images/create_website.svg" alt="" />
                            </figure>
                        </div>
                    </div>
                    <!-- Service Item End -->
                </div>

                <div class="col-lg-4 col-md-6">
                    <!-- Service Item Start -->
                    <div class="service-item wow fadeInUp" data-wow-delay="0.5s">
                        <div class="service-content">
                            <div class="service-content-title">
                                <h2> فريق تقني متخصص </h2>

                            </div>
                            <p>
                                نوفر لك مبرمجين ومصممين متخصصين لإدارة مشروعك التقني وتطويره بشكل مستمر، حسب احتياجاتك.
                            </p>
                        </div>
                        <div class="service-image">
                            <figure class="image-anime">
                                <img src="{{ asset('assets/front/') }}/images/support.svg" alt="" />
                            </figure>
                        </div>
                    </div>
                    <!-- Service Item End -->
                </div>

                <div class="col-lg-4 col-md-6">
                    <!-- Service Item Start -->
                    <div class="service-item wow fadeInUp" data-wow-delay="0.75s">
                        <div class="service-content">
                            <div class="service-content-title">
                                <h2> خدمة العملاء </h2>

                            </div>
                            <p>
                                نقدم لك موظفين متخصصين لخدمة العملاء، جاهزين للرد على استفسارات عملائك باحترافية على مدار
                                الساعة.
                            </p>
                        </div>
                        <div class="service-image">
                            <figure class="image-anime">
                                <img src="{{ asset('assets/front/') }}/images/support2.svg" alt="" />
                            </figure>
                        </div>
                    </div>
                    <!-- Service Item End -->
                </div>

                <div class="col-lg-4 col-md-6">
                    <!-- Service Item Start -->
                    <div class="service-item wow fadeInUp" data-wow-delay="1s">
                        <div class="service-content">
                            <div class="service-content-title">
                                <h2> خدمات التوصيل </h2>

                            </div>
                            <p>
                                ننسق مع شركات توصيل موثوقة لتوفير خدمة توصيل سريعة وآمنة لعملائك في مختلف المناطق.
                            </p>
                        </div>
                        <div class="service-image">
                            <figure class="image-anime">
                                <img src="{{ asset('assets/front/') }}/images/orders.svg" alt="" />
                            </figure>
                        </div>
                    </div>
                    <!-- Service Item End -->
                </div>

                <div class="col-lg-4 col-md-6">
                    <!-- Service Item Start -->
                    <div class="service-item wow fadeInUp" data-wow-delay="1.25s">
                        <div class="service-content">
                            <div class="service-content-title">
                                <h2> التسويق الإلكتروني </h2>

                            </div>
                            <p>
                                نساعدك على الوصول لجمهورك المستهدف من خلال حملات تسويقية رقمية احترافية عبر وسائل التواصل
                                الاجتماعي ومحركات البحث.


                            </p>
                        </div>
                        <div class="service-image">
                            <figure class="image-anime">
                                <img src="{{ asset('assets/front/') }}/images/seo.svg" alt="" />
                            </figure>
                        </div>
                    </div>
                    <!-- Service Item End -->
                </div>

                <div class="col-lg-4 col-md-6">
                    <!-- Service Item Start -->
                    <div class="service-item wow fadeInUp" data-wow-delay="1.5s">
                        <div class="service-content">
                            <div class="service-content-title">
                                <h2> الاستضافة والأمان </h2>

                            </div>
                            <p>
                                نوفر لك بيئة استضافة آمنة ومستقرة مع نظام حماية متكامل لضمان أمان بيانات متجرك وعملائك.


                            </p>
                        </div>
                        <div class="service-image">
                            <figure class="image-anime">
                                <img src="{{ asset('assets/front/') }}/images/save.svg" alt="" />
                            </figure>
                        </div>
                    </div>
                    <!-- Service Item End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Services Section End -->



    <!-- Why Choose Us Section Start -->
    <div class="why-choose-us" style="padding: 0 0px 50px 0">
        <div class="container">
            <div class="row section-row align-items-center">
                <div class="col-lg-8 col-md-12">

                </div>
            </div>

            <div class="row">
                <div class="col-md-12">

                    <!-- Why Us Explore Item Start -->
                    <div class="why-us-explore-item">
                        <div class="row">
                               <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp"> رسالة الشركة  </h3>
                        {{-- <h2 class="text-anime-style-3">Why choose us ?</h2> --}}
                    </div>
                    <!-- Section Title End -->
                            <div class="col-md-12">
                                <div class="why-us-section-title">
                                    <!-- Section Title Start -->
                                    <div class="section-title">
                                        <h2 style="font-size: 20px;margin-bottom: 20px;line-height: 2;"> 📝
                                            نسعى في BioKWT إلى تمكين الأفراد والشركات من التحول الرقمي الشامل، من خلال تقديم حلول تقنية متكاملة، تدعم النمو، وتحقق التميز والاحترافية في السوق الإلكتروني.

                                        </h2>
                                        <h2 style="font-size: 20px;margin-bottom: 20px;line-height: 2;">
                                            📌 نلتزم بتقديم خدمات ذات جودة عالية، وخلق شراكات ناجحة طويلة الأمد، قائمة على الثقة، الابتكار، والدعم المستمر.


                                        </h2>
                                    </div>
                                    <!-- Section Title End -->

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Why Us Explore Item End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Why Choose Us Section End -->

@endsection
