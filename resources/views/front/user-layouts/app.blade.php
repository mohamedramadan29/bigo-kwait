 @include('front.user-layouts._head_scripts')
 <!-- fixed-top-->
 @include('front.user-layouts._header')
 <!-- ////////////////////////////////////////////////////////////////////////////-->
 @include('front.user-layouts._sidebar')
 @yield('content')

 <!---------------------------- Success Failes MEssages  ------------------>
 @if (Session::has('Success_message'))
     @php
         toastify()->success(\Illuminate\Support\Facades\Session::get('Success_message'));
     @endphp
 @endif
 @if (Session::has('Error_message'))
     @php
         toastify()->error(\Illuminate\Support\Facades\Session::get('Error_message'));
     @endphp
 @endif
 @if ($errors->any())
     @foreach ($errors->all() as $error)
         @php
             toastify()->error($error);
         @endphp
     @endforeach
 @endif
 <!-- ////////////////////////////////////////////////////////////////////////////-->
 @include('front.user-layouts._footer')
 @include('front.user-layouts._footer_scripts')
