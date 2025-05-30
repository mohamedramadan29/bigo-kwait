@extends('dashboard.layouts.app')
@section('title', ' ادارة العلامات التجارية ')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.min.css">
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.2/css/buttons.dataTables.min.css"> --}}

    <style>
        .dt-layout-row {
            display: flex;
            justify-content: space-between
        }
    </style>

@endsection
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="mb-2 content-header-left col-md-6 col-12 breadcrumb-new">
                    <h3 class="mb-0 content-header-title d-inline-block"> ادارة العلامات التجارية </h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard.welcome') }}">الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item active"> ادارة العلامات التجارية
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-6 col-12">

                </div>
            </div>
            <div class="content-body">

                <!-- Bordered striped start -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#createbrand">
                                    اضافة علامة تجارية
                                </button>

                                @include('dashboard.brands._create')

                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="yajra_datatable"
                                            class="table table-striped table-bordered column-rendering">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th> الاسم </th>
                                                    <th> الحالة </th>
                                                    <th> عدد المنتجات </th>
                                                    <th> تاريخ الانشاء </th>
                                                    <th> الصورة </th>
                                                    <th> العمليات </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($brands as $brand)
                                                    <tr>
                                                        <th>{{ $loop->iteration }}</th>
                                                        <th> {{ $brand->name }} </th>
                                                        <th> {{ $brand->getStatus() }} </th>
                                                        <th> {{ $brand->Products->count() }} </th>
                                                        <th> {{ date('y/m-d h:i A',strtotime($brand->created_at)) }} </th>
                                                        <th> <img width="80px" height="80px" src="{{ $brand->getImage() }}" alt=""> </th>
                                                        <td>
                                                            <a class="btn btn-info btn-sm"
                                                                href="{{ route('dashboard.brands.edit',$brand->id) }}"><i
                                                                    class="la la-edit"></i> تعديل </a>
                                                            <button type="button" class="btn btn-danger btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#delete_brand_{{ $brand->id }}">
                                                                حذف <i class="la la-trash"></i>
                                                            </button>
                                                            @include('dashboard.brands._delete')
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Bordered striped end -->
            </div>
        </div>
    </div>


@endsection

@section('js')
    @if ($errors->any())
        <script>
            $(document).ready(function() {
                $("#createbrand").modal('show');
            });
        </script>
    @endif

@endsection
