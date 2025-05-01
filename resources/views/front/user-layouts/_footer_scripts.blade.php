  <!-- BEGIN VENDOR JS-->
  <script src="{{ asset('assets/front/user-dashboard/') }}/vendors/js/vendors.min.js" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="{{ asset('assets/front/user-dashboard/') }}/vendors/js/charts/chartist.min.js" type="text/javascript">
  </script>
  <script src="{{ asset('assets/front/user-dashboard/') }}/vendors/js/charts/chartist-plugin-tooltip.min.js"
      type="text/javascript"></script>
  <script src="{{ asset('assets/front/user-dashboard/') }}/vendors/js/charts/raphael-min.js" type="text/javascript">
  </script>
  <script src="{{ asset('assets/front/user-dashboard/') }}/vendors/js/charts/morris.min.js" type="text/javascript">
  </script>
  <script src="{{ asset('assets/front/user-dashboard/') }}/vendors/js/timeline/horizontal-timeline.js"
      type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="{{ asset('assets/front/user-dashboard/') }}/js/core/app-menu.js" type="text/javascript"></script>
  <script src="{{ asset('assets/front/user-dashboard/') }}/js/core/app.js" type="text/javascript"></script>
  <script src="{{ asset('assets/front/user-dashboard/') }}/js/scripts/customizer.js" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="{{ asset('assets/front/user-dashboard/') }}/js/scripts/pages/dashboard-ecommerce.js"
      type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->

  <!--- Start File Input  -->

  <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.4/js/fileinput.min.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.4/js/locales/LANG.js"></script>
  <!-- To creat Slug  -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/speakingurl/14.0.1/speakingurl.min.js"></script>

  <script src="{{ asset('assets/vendor/locale/ar.js') }}"></script>
  {!! NoCaptcha::renderJs() !!}
  @yield('js')
  @toastifyJs
  @livewireScripts
  <script>
      $("#single-image").fileinput({
          theme: 'fa5',
          allowedFileTypes: ['image'],
          language: 'ar',
          maxFileCount: 1,
          enableResumableUpload: false,
          showUpload: false,
          height: 100
      });
  </script>
  <script>
      $("#single-image2").fileinput({
          theme: 'fa5',
          allowedFileTypes: ['image'],
          language: 'ar',
          maxFileCount: 1,
          enableResumableUpload: false,
          showUpload: false,
          height: 100
      });
  </script>
  <!-- END PAGE LEVEL JS-->

  </body>

  </html>
