@extends('front.user-layouts.app')
@section('title')
    العلامات التجارية
@endsection
@section('content')
    <!-- ==================================================== -->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="mb-2 content-header-left col-md-6 col-12 breadcrumb-new">
                    <h3 class="mb-0 content-header-title d-inline-block"> العلامات التجارية  </h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('user.account') }}">الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item active"> العلامات التجارية
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-6 col-12">

                </div>
            </div>

            <!-- Start Container Fluid -->
            <div class="content-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{ route('user.store.brands.create') }}" class="btn btn-primary"> اضافة علامة تجارية
                                      </a>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead class="bg-light-subtle">
                                                <tr>
                                                    <th> # </th>
                                                    <th> اسم العلامة التجارية</th>
                                                    <th> الحالة</th>
                                                    <th> الصورة</th>
                                                    <th> العمليات</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($brands as $brand)
                                                    <tr>
                                                        <td>
                                                            {{ $loop->iteration }}
                                                        </td>
                                                        <td> {{ $brand['name'] }} </td>
                                                        <td>
                                                            @if ($brand['status'] == 1)
                                                                <span class="badge bg-success"> مفعل </span>
                                                            @else
                                                                <span class="badge bg-danger"> غير مفعل </span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <img class="img-thumbnail" src="{{ $brand->getImage() }}"
                                                                width="80" height="80px" alt="">
                                                        </td>
                                                        <td>
                                                            <a class="btn btn-info btn-sm"
                                                                href="{{ route('user.store.brands.update', $brand->id) }}"><i
                                                                    class="la la-edit"></i> تعديل </a>
                                                            <button type="button" class="btn btn-danger btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#delete_brands_{{ $brand->id }}">
                                                                حذف <i class="la la-trash"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <!-- Modal -->
                                                    @include('front.user.store.brands.delete')
                                                @empty
                                                    <tr>
                                                        <td colspan="5" class="text-center">لا يوجد علامات تجارية</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- end table-responsive -->

                        </div>
                    </div>
                </div>

            </div>
            <!-- End Container Fluid -->

        </div>
    </div>
    <!-- ==================================================== -->
    <!-- End Page Content -->
    <!-- ==================================================== -->
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{--    <!-- DataTables JS --> --}}
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            // تحقق ما إذا كان الجدول قد تم تهيئته من قبل
            if ($.fn.DataTable.isDataTable('#table-search')) {
                $('#table-search').DataTable().destroy(); // تدمير التهيئة السابقة
            }

            // تهيئة DataTables من جديد
            $('#table-search').DataTable({
                "language": {
                    "search": "بحث:",
                    "lengthMenu": "عرض _MENU_ عناصر لكل صفحة",
                    "zeroRecords": "لم يتم العثور على سجلات",
                    "info": "عرض _PAGE_ من _PAGES_",
                    "infoEmpty": "لا توجد سجلات متاحة",
                    "infoFiltered": "(تمت التصفية من إجمالي _MAX_ سجلات)",
                    "paginate": {
                        "previous": "السابق",
                        "next": "التالي"
                    }
                }
            });
        });
    </script>
@endsection
