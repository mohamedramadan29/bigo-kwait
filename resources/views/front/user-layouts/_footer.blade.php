<!-- زر واتساب ثابت -->
<a href="{{ route('user.support.tickets') }}"
    class="whatsapp-float"
    title=" تواصل مع الدعم الفني  ">
     الدعم الفني  <i class="bi bi-chat-left-fill"></i>
 </a>

<!-- ////////////////////////////////////////////////////////////////////////////-->
    <footer class="footer footer-static footer-light navbar-border navbar-shadow">
        <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
            <span class="float-md-left d-block d-md-inline-block"> جميع الحقوق محفوظة  &copy; {{ date('Y') }}
                لدي شركة
                <a class="text-bold-800 grey darken-2"
                    href="{{ route('front.index') }}" target="_blank"> {{ $setting->name }}  </a>,

                </span>
        </p>
    </footer>


    <!-- WhatsApp Button Start -->
<style>
    .whatsapp-float {
        position: fixed;
        bottom: 20px;
        left: 20px;
        background-color: #2980b9;
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
    .whatsapp-float:hover{
        color: #fff;
    }
    </style>
