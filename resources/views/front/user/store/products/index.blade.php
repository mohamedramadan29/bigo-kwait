@extends('front.user-layouts.app')
@section('title', ' ادارة المنتجات ')
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
                    <h3 class="mb-0 content-header-title d-inline-block"> ادارة المنتجات </h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('user.account') }}">الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item active"> ادارة المنتجات
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
                                <a href="{{ route('user.store.products.create') }}" type="button" class="btn btn-primary">
                                    اضافة منتج
                                </a>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="yajra_datatable"
                                            class="table table-striped table-bordered column-rendering">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th> اسم المنتج </th>
                                                    <th> منتج متغير </th>
                                                    <th> صور المنتج </th>
                                                    <th> الحالة </th>
                                                    <th> sku </th>
                                                    <th> متاح الي </th>
                                                    <th> القسم </th>
                                                    <th> العلامة التجارية </th>
                                                    <th> السعر </th>
                                                    <th> الكمية </th>
                                                    <th> العمليات </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($products as $product)
                                                    <tr>
                                                        <td> {{ $loop->iteration }} </td>
                                                        <td>{{ $product->name }}</td>
                                                        <td>{{ $product->hasVariantTranslated() }}</td>
                                                        <td>
                                                            <div id="carouselExampleControls_{{ $product['id'] }}"
                                                                class="carousel slide" data-ride="carousel">
                                                                <div class="carousel-inner">
                                                                    @foreach ($product->images as $key => $image)
                                                                        <div
                                                                            class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                                            <img class="d-block w-100"
                                                                                src="{{ asset('assets/uploads/products/' . $image->file_name) }}"
                                                                                alt="First slide">
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                                <a class="carousel-control-next"
                                                                    href="#carouselExampleControls_{{ $product['id'] }}"
                                                                    role="button" data-slide="next">
                                                                    <span class="carousel-control-next-icon"
                                                                        aria-hidden="true"></span>
                                                                    <span class="sr-only">Next</span>
                                                                </a>
                                                                <a class="carousel-control-prev"
                                                                    href="#carouselExampleControls_{{ $product['id'] }}"
                                                                    role="button" data-slide="prev">
                                                                    <span class="carousel-control-prev-icon"
                                                                        aria-hidden="true"></span>
                                                                    <span class="sr-only">Previous</span>
                                                                </a>

                                                            </div>

                                                        </td>
                                                        <td> {{ $product->getProductStatus() }}</td>
                                                        <td>{{ $product->sku }}</td>
                                                        <td>{{ $product->available_for }}</td>
                                                        <td>{{ $product->category->name }}</td>
                                                        <td>{{ $product->brand->name }}</td>
                                                        <td>{{ $product->price }}</td>
                                                        <td>{{ $product->qty ?? 0 }}</td>
                                                        <td>
                                                            {{-- <a href="{{ route('user.store.products.edit', $product->id) }}"
                                                                class="btn btn-primary btn-sm">تعديل</a> --}}
                                                                <a href="{{ route('user.store.product.show', $product->id) }}" class="btn btn-info btn-sm"> <i class="la la-eye"></i> </a>


                                                                <button type="button" class="btn btn-danger btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#delete_product_{{ $product->id }}">
                                                                حذف <i class="la la-trash"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    @include('front.user.store.products.delete')
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

    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>

    {{-- <script src="https://cdn.datatables.net/buttons/3.2.2/js/dataTables.buttons.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/3.2.2/js/buttons.html5.min.js"></script> --}}
    <!--------- Show Model If Have Error Validations -->


    @if ($errors->any())
        <script>
            $(document).ready(function() {
                $("#createcoupon").modal('show');
            });
        </script>
    @endif

    <script>
        var lang = "{{ app()->getLocale() }}";
        $(document).ready(function() {
            $('#yajra_datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: ,
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'name',
                        name: 'name',
                    },
                    {
                        data: 'has_variant',
                        name: 'has_variant',
                    },
                    {
                        data: 'images',
                        name: 'images',
                    },
                    {
                        data: 'status',
                        name: 'status',
                    },
                    {
                        data: 'sku',
                        name: 'sku',
                    },
                    {
                        data: 'available_for',
                        name: 'available_for',
                    },
                    {
                        data: 'category',
                        name: 'category',
                    },
                    {
                        data: 'brand',
                        name: 'brand',
                    },
                    {
                        data: 'price',
                        name: 'price',
                    },
                    {
                        data: 'qty',
                        name: 'qty',
                    },
                    {
                        data: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
                // layout: {
                //     topStart: {
                //         buttons: [
                //              'copy'
                //         ]
                //     }
                // },
                language: lang === 'ar' ? {
                    url: '//cdn.datatables.net/plug-ins/2.2.2/i18n/ar.json',
                } : {},
            });
        });
    </script>



@endsection
