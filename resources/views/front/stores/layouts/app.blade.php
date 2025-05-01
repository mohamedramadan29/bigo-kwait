@include('front.stores.layouts._header_scripts')
<!-- fixed-top-->
@include('front.stores.layouts._header')
@include('front.stores.layouts._navbar')

<!-- ////////////////////////////////////////////////////////////////////////////-->
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
@include('front.stores.layouts._footer')
@include('front.stores.layouts._footer_scripts')
