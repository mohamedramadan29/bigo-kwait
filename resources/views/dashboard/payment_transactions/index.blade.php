@extends('dashboard.layouts.app')
@section('title', ' عمليات الدفع ')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="mb-2 content-header-left col-md-6 col-12 breadcrumb-new">
                    <h3 class="mb-0 content-header-title d-inline-block"> عمليات الدفع </h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard.welcome') }}">الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item active"> عمليات الدفع
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
                                                    <th> المستخدم </th>
                                                    <th> رقم التتبع </th>
                                                    <th> المبلغ </th>
                                                    <th> الحالة </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($transactions as $trans)
                                                    <tr>
                                                        <th scope="row">{{ $loop->iteration }}</th>
                                                        <td> {{ $trans->User->name }} </td>
                                                        <td>
                                                            {{ $trans->transaction_id }}
                                                        </td>
                                                        <td>
                                                            {{ $trans->amount }}
                                                        </td>
                                                        <td>
                                                            {{ $trans->status }}
                                                        </td>
                                                    </tr>
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
