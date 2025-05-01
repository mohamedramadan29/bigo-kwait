@extends('front.user-layouts.app')
@section('title')
     تعديل البانر
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
                    <h3 class="mb-0 content-header-title d-inline-block"> تعديل البانر </h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('user.account') }}">الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('user.store.sliders.index') }}"> بنرات المتجر
                                    </a>
                                </li>
                                <li class="breadcrumb-item active"><a href="#">  تعديل البانر </a>
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
                                    <h4 class="card-title" id="basic-layout-form"> تعديل البانر  </h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i> </a>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form method="post" action="{{ route('user.store.sliders.update', $slider->id) }}"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-body">
                                                <div class="col-xl-12 col-lg-12 ">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="title" class="form-label"> عنوان
                                                                    العرض </label>
                                                                <input required type="text" id="title"
                                                                    class="form-control" name="title"
                                                                    value="{{ old('title', $slider->title) }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="description" class="form-label"> الوصف  </label>
                                                                <textarea required class="form-control bg-light-subtle" id="description" rows="7" name="description"
                                                                    >{{ old('description', $slider->description) }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="link" class="form-label"> الرابط </label>
                                                                <input required type="text" id="link"
                                                                    class="form-control" name="link"
                                                                    value="{{ old('link', $slider->link) }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="link_text" class="form-label"> نص الرابط </label>
                                                                <input required type="text" id="link_text"
                                                                    class="form-control" name="link_text"
                                                                    value="{{ old('link_text', $slider->link_text) }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label for="status" class="form-label"> حالة التفعيل
                                                            </label>
                                                            <select required name="status" class="form-control"
                                                                id="status" data-choices data-choices-groups
                                                                data-placeholder="Select Status">
                                                                <option value=""> -- حدد الحالة --</option>
                                                                <option @selected(old('status', $slider->status) == 1) value="1">مفعل
                                                                </option>
                                                                <option @selected(old('status', $slider->status) == 0) value="0">غير مفعل
                                                                </option>
                                                            </select>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="description" class="form-label"> صورة العرض
                                                                </label>
                                                                <input type="file" class="form-control"
                                                                    id="single-image-edit" name="image" accept="image/*">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-actions">
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="la la-check-square-o"></i> حفظ
                                                        </button>
                                                        <a href="{{ route('user.store.sliders.index') }}" type="button"
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


@section('js')
    <!-- Start file Input  Update  -->
    <script>
        $("#single-image-edit").fileinput({
            theme: 'fa5',
            allowedFileTypes: ['image'],
            language: 'ar',
            maxFileCount: 1,
            enableResumableUpload: false,
            showUpload: false,
            initialPreviewAsData: true,
            initialPreview: [
                "{{ asset($slider->getImage()) }}"
            ],
        });
    </script>
    <!-- End File Input -->
@endsection

@endsection
