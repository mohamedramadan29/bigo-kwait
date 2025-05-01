@extends('front.user-layouts.app')
@section('title', ' تعديل العلامة التجارية ')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="mb-2 content-header-left col-md-6 col-12 breadcrumb-new">
                    <h3 class="mb-0 content-header-title d-inline-block"> تعديل العلامة التجارية </h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('user.account') }}">الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('user.store.brands') }}"> العلامات التجارية
                                    </a>
                                </li>
                                <li class="breadcrumb-item active"><a href="#"> تعديل العلامة التجارية </a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
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
                                    <h4 class="card-title" id="basic-layout-form"> تعديل العلامة التجارية </h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i> </a>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form method="post" action="{{ route('user.store.brands.update', $brand['id']) }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="name" class="form-label"> عنوان
                                                                العلامة التجارية </label>
                                                            <input required type="text" id="name"
                                                                class="form-control" name="name"
                                                                value="{{ $brand['name'] }}">
                                                        </div>

                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="crater" class="form-label"> حالة التفعيل
                                                            </label>
                                                            <select required name="status" class="form-control"
                                                                id="crater" data-choices data-choices-groups
                                                                data-placeholder="Select Crater">
                                                                <option value=""> -- حدد الحالة --</option>
                                                                <option @if ($brand['status'] == 1) selected @endif
                                                                    value="1">مفعل</option>
                                                                <option @if ($brand['status'] == 0) selected @endif
                                                                    value="0">غير مفعل</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-12">
                                                        <div class="form-group">
                                                            <input type="file" class="form-control" name="image"
                                                                id="single-image-edit" accept="image/*">

                                                        </div>
                                                    </div>

                                                    <div class="col-12">
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
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>

@endsection


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
                "{{ asset($brand->getImage()) }}"
            ],
        });
    </script>
    <!-- End File Input -->
@endsection
