<!-- Jquery Library File -->
<script src="{{ asset('assets/front/') }}/js/jquery-3.7.1.min.js"></script>
<!-- Bootstrap js file -->
<script src="{{ asset('assets/front/') }}/js/bootstrap.min.js"></script>
<!-- Validator js file -->
<script src="{{ asset('assets/front/') }}/js/validator.min.js"></script>
<!-- SlickNav js file -->
<script src="{{ asset('assets/front/') }}/js/jquery.slicknav.js"></script>
<!-- Swiper js file -->
<script src="{{ asset('assets/front/') }}/js/swiper-bundle.min.js"></script>
<!-- Counter js file -->
<script src="{{ asset('assets/front/') }}/js/jquery.waypoints.min.js"></script>
<script src="{{ asset('assets/front/') }}/js/jquery.counterup.min.js"></script>
<!-- Isotop js file -->
<script src="{{ asset('assets/front/') }}/js/isotope.min.js"></script>
<!-- Magnific js file -->
<script src="{{ asset('assets/front/') }}/js/jquery.magnific-popup.min.js"></script>
<!-- SmoothScroll -->
<script src="{{ asset('assets/front/') }}/js/SmoothScroll.js"></script>
<!-- MagicCursor js file -->
<script src="{{ asset('assets/front/') }}/js/gsap.min.js"></script>
<script src="{{ asset('assets/front/') }}/js/magiccursor.js"></script>
<!-- Text Effect js file -->
<script src="{{ asset('assets/front/') }}/js/SplitText.js"></script>
<script src="{{ asset('assets/front/') }}/js/ScrollTrigger.min.js"></script>
<!-- Wow js file -->
<script src="{{ asset('assets/front/') }}/js/wow.js"></script>
<!-- Main Custom js file -->
<script src="{{ asset('assets/front/') }}/js/function.js"></script>
{!! NoCaptcha::renderJs() !!}
@yield('js')
@toastifyJs
</body>

</html>
