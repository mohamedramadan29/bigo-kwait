@extends('front.user-layouts.app')
@section('title')
    اضافة علامة تجارية جديدة
@endsection
@section('css')
    <!-- default icons used in the plugin are from Bootstrap 5.x icon library (which can be enabled by loading CSS below) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css"
        crossorigin="anonymous">
    <!-- the fileinput plugin styling CSS file -->
    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.4/css/fileinput.min.css" media="all"
        rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <!-- ==================================================== -->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="mb-2 content-header-left col-md-6 col-12 breadcrumb-new">
                    <h3 class="mb-0 content-header-title d-inline-block"> اضافة علامة تجارية جديدة </h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('user.account') }}">الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('user.store.brands') }}"> العلامات التجارية
                                    </a>
                                </li>
                                <li class="breadcrumb-item active"><a href="#"> اضافة علامة تجارية جديدة </a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Start Container Fluid -->
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger">{{ $error }}</div>
                                    @endforeach
                                @endif
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form"> اضافة علامة تجارية جديدة </h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i> </a>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form method="post" action="{{ route('user.store.brands.create') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-body">
                                                <div class="col-xl-12 col-lg-12 ">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="name" class="form-label"> عنوان
                                                                    العلامة التجارية </label>
                                                                <input required type="text" id="name"
                                                                    class="form-control" name="name"
                                                                    value="{{ old('name') }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label for="crater" class="form-label"> حالة التفعيل
                                                            </label>
                                                            <select required name="status" class="form-control"
                                                                id="crater" data-choices data-choices-groups
                                                                data-placeholder="Select Crater">
                                                                <option value=""> -- حدد الحالة --</option>
                                                                <option @selected(old('status') == 1) value="1">مفعل
                                                                </option>
                                                                <option @selected(old('status') == 0) value="0">غير مفعل
                                                                </option>
                                                            </select>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="description" class="form-label"> صورة العلامة التجارية
                                                                </label>
                                                                <input required type="file" class="form-control"
                                                                    id="single-image" name="image" accept="image/*">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-actions">
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="la la-check-square-o"></i> حفظ
                                                        </button>
                                                        <a href="{{ route('user.store.categories') }}" type="button"
                                                            class="mr-1 btn btn-warning">
                                                            <i class="ft-x"></i> رجوع
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- End Container Fluid -->


    <!-- ==================================================== -->
    <!-- End Page Content -->
    <!-- ==================================================== -->
@endsection

@section('js')
@endsection
