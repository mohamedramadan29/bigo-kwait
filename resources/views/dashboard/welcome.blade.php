@extends('dashboard.layouts.app')
@section('title')
    الرئيسية
@endsection
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- eCommerce statistic -->
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="text-left media-body">
                                            <h3 class="info"> 10 </h3>
                                            <h6> الشركات   </h6>
                                        </div>
                                        <div>
                                            <i class="float-right icon-basket-loaded info font-large-2"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="text-left media-body">
                                            <h3 class="info"> 10 </h3>
                                            <h6> الافراد   </h6>
                                        </div>
                                        <div>
                                            <i class="float-right icon-basket-loaded info font-large-2"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="text-left media-body">
                                            <h3 class="info"> 10 </h3>
                                            <h6> الطلبات  </h6>
                                        </div>
                                        <div>
                                            <i class="float-right icon-basket-loaded info font-large-2"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="text-left media-body">
                                            <h3 class="warning"> 20 </h3>
                                            <h6> المنتجات  </h6>
                                        </div>
                                        <div>
                                            <i class="float-right icon-pie-chart warning font-large-2"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="text-left media-body">
                                            <h3 class="success"> 30 </h3>
                                            <h6> التصنيفات   </h6>
                                        </div>
                                        <div>
                                            <i class="float-right icon-user-follow success font-large-2"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
                <!-- Recent Transactions -->

            </div>
        </div>
    </div>
@endsection


@section('js')
    {{-- <script src="{{ asset('assets/admin/js/components/apexchart-column.js') }}"></script>
    <!-- Apex Chart Bar Demo js -->
    <script src="{{ asset('assets/admin/js/components/apexchart-bar.js') }}"></script> --}}
    <!-- BEGIN PAGE LEVEL JS-->
    <!-- BEGIN VENDOR JS-->
    <script src="{{ asset('assets/admin/') }}/vendors/js/vendors.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{ asset('assets/admin/') }}/vendors/js/charts/chart.min.js" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->

    <script src="{{ asset('assets/admin/') }}/js/scripts/charts/chartjs/bar/bar.js" type="text/javascript"></script>


    <script src="{{ asset('assets/admin/') }}/js/scripts/charts/chartjs/bar/column.js" type="text/javascript"></script>
@endsection
