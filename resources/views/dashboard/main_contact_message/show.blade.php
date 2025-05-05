@extends('dashboard.layouts.app')
@section('title', ' تفاصيل الرسالة ')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="mb-2 content-header-left col-md-6 col-12 breadcrumb-new">
                    <h3 class="mb-0 content-header-title d-inline-block"> تفاصيل الرسالة </h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard.welcome') }}">الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item active"> تفاصيل الرسالة
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
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped" id="DataTables_Table_0">
                                            <tbody>
                                                <tr>
                                                    <td> الاسم </td>
                                                    <td> {{ $message->name }} </td>
                                                </tr>
                                                <tr>
                                                    <td> البريد الالكتروني </td>
                                                    <td>
                                                        {{ $message->email }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> رقم الهاتف </td>
                                                    <td>
                                                        {{ $message->phone }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> عنوان الرسالة </td>
                                                    <td>
                                                        {{ $message->subject }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> توقيت الرسالة </td>
                                                    <td>
                                                        {{ date('y-m-d h:i A', strtotime($message->created_at)) }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> الحالة </td>
                                                    <td>
                                                        {{ $message->status }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> الرسالة </td>
                                                    <td>
                                                        {{ $message->messages }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <form method="POST" action="{{ route('dashboard.public-messages.show',$message->id) }}">
                                                        @csrf
                                                        <div class="d-flex align-items-center gap-2">
                                                            <div class="form-group" style="width:80%">
                                                                <label for="status"> حدد حالة الرسالة  </label>
                                                                <select name="status" id="" class="form-control">
                                                                  <option @selected($message->status == 'معلقة') value="معلقة"> معلقة </option>
                                                                  <option @selected($message->status == 'تمت القراءة') value="تمت القراءة"> تمت القراءة </option>
                                                                  <option @selected($message->status == 'تم الرد') value="تم الرد"> تم الرد </option>
                                                                </select>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary"> تحديث الحالة </button>
                                                        </div>
                                                    </form>
                                                </tr>
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
