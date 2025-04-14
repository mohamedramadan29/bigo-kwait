@extends('dashboard.layouts.app')
@section('title', ' ادارة المتاجر  ')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="mb-2 content-header-left col-md-6 col-12 breadcrumb-new">
                    <h3 class="mb-0 content-header-title d-inline-block"> ادارة المتاجر </h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard.welcome') }}">الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item active"> ادارة المتاجر
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
                            {{-- <div class="card-header">
                                <a href="{{ route('dashboard.compa$users.create') }}" class="btn btn-primary"> اضافة موظف </a>
                            </div> --}}
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped" id="DataTables_Table_0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th> اسم المتجر  </th>
                                                    <th> وصف المتجر </th>
                                                    <th> مالك المتجر  </th>
                                                    <th> الحالة </th>
                                                    <th> العمليات </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($stores as $store)
                                                    <tr>
                                                        <th scope="row">{{ $loop->iteration }}</th>
                                                        <td> {{ $store->name }} </td>
                                                        <td>
                                                            {{ $store->description }}
                                                        </td>
                                                        <td>
                                                            {{ $store->user_id }}
                                                        </td>
                                                        <td>
                                                            {{ $store->status == 1 ? 'مفعل' : 'غير مفعل' }}
                                                        </td>
                                                        <td>
                                                            <a class="btn btn-info btn-sm"
                                                                href="{{ route('dashboard.compa$users.update', $store->id) }}"><i
                                                                    class="la la-edit"></i> تعديل </a>
                                                            <button type="button" class="btn btn-danger btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#delete_store_{{ $store->id }}">
                                                                حذف <i class="la la-trash"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    @include('dashboard.stores._delete')
                                                @empty
                                                    <td colspan="8"> لا يوجد بيانات في الوقت الحالي </td>
                                                @endforelse
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
