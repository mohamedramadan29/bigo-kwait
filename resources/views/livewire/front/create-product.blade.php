<section id="icon-tabs">
    @if (!empty($successMessage) && $currentStep == 1)
        <div class="alert alert-success"> {{ $successMessage }} </div>
    @endif
    <ul class="wizard-timeline center-align">
        <li class="{{ $currentStep > 1 ? 'completed' : '' }}">
            <span class="step-num">1</span>
            <label> المعلومات الاساسية للمنتج </label>
        </li>
        <li class="{{ $currentStep > 2 ? 'completed' : '' }}">
            <span class="step-num">2</span>
            <label> متغيرات المنتج </label>
        </li>
        <li class="active {{ $currentStep > 3 ? 'completed' : '' }}">
            <span class="step-num">3</span>
            <label> مرفقات المنتج </label>
        </li>
        <li class="{{ $currentStep == 4 ? 'completed' : '' }}">
            <span class="step-num">4</span>
            <label> تاكيد الرفع </label>
        </li>
    </ul>
    <form class="wizard-circle">
        <div class="form-body">
            {{-- first step Product Basic Info --}}
            <div class="setup-content {{ $currentStep != 1 ? 'displaynone' : '' }}" id="step-1">
                <h3>  المعلومات الاساسية للمنتج </h3>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="firstName2"> اسم المنتج   :</label>
                            <input wire:model.live="name" type="text" class="form-control" id="firstName2"
                                placeholder="اسم المنتج  ">
                            @error('name')
                                <span class="text-danger" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="emailAddress3"> الوصف المختصر :
                                :</label>
                            <textarea wire:model.live="small_desc" class="form-control" id="emailAddress3"></textarea>
                            @error('small_desc')
                                <span class="text-danger" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="location2"> الوصف   :</label>
                            <textarea wire:model.live="description" class="form-control" id="emailAddress3"></textarea>
                            @error('description')
                                <span class="text-danger" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="category"> حدد القسم :</label>
                            <select wire:model.live="category_id" class="form-control custom-select" id="category">
                                <option value=""> حدد القسم </option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="brand"> حدد العلامة التجارية :</label>
                            <select wire:model.live="brand_id" class="form-control custom-select" id="brand">
                                <option value=""> حدد العلامة التجارية </option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                            @error('brand_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="lastName2">رمز المنتج Sku :</label>
                            <input wire:model.live="sku" type="text" class="form-control" id="lastName2">
                            @error('sku')
                                <span class="text-danger" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="date"> متاح الي :</label>
                            <input wire:model.live="available_for" type="date" class="form-control"
                                id="date">
                            @error('available_for')
                                <span class="text-danger" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="date"> تاجز :</label>
                            <input type="text" wire:model="tags" id="tagInput" class="form-control"
                                placeholder="Add tags">
                            @error('tags')
                                <span class="text-danger" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <button class="mb-3 btn btn-primary pull-right" wire:click="firststep" type="button"> التالي
                </button>
            </div>
            {{--  step 2 Vartian Option Product   --}}
            <div class="row {{ $currentStep != 2 ? 'displaynone' : '' }}">
                <div class="col-12">
                    <h4> متغيرات المنتج </h4>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="has_variant"> نوع المنتج </label>
                        <select name="has_variant" id="has_variant" class="form-control"
                            wire:model.live='has_variant'>
                            <option value="0" selected> بسيط </option>
                            <option value="1"> متغير </option>
                        </select>
                    </div>
                    @error('has_variant')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <label for="has_discount"> هل هناك خصم علي المنتج </label>
                        <select name="has_discount" id="has_discount" class="form-control"
                            wire:model.live='has_discount'>
                            <option value="0" selected> لا </option>
                            <option value="1"> نعم </option>
                        </select>
                    </div>
                    @error('has_discount')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                @if ($has_variant == 1)
                    <hr>
                    @for ($i = 0; $i < $ValuerowCount; $i++)
                        <div class="col-md-12 d-flex ">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="prices.{{ $i }}"> سعر المنتج </label>
                                    <input wire:model='prices.{{ $i }}' type="number"
                                        id="prices.{{ $i }}" class="form-control"
                                        placeholder=" بداية الخصم  ">
                                    @error('prices.{{ $i }}')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="quantities.{{ $i }}"> الكمية </label>
                                    <input wire:model.live='quantities.{{ $i }}' type="number"
                                        id="quantities.{{ $i }}" class="form-control"
                                        placeholder=" بداية الخصم  ">
                                    @error('quantities.{{ $i }}')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            @foreach ($attributes as $attr)
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="vartiant_qty"> {{ $attr['name'] }} </label>
                                        <select wire:model='attributeValues.{{ $i }}.{{ $attr['id'] }}'
                                            id="" class="form-control">
                                            <option value="" selected> -- حدد -- </option>
                                            @foreach ($attr['attributeValues'] as $item)
                                                <option value="{{ $item->id }}">{{ $item->value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endfor
                    <div class="col-12 d-flex">
                        <button class="btn btn-warning btn-sm pull-right" wire:click="addvartant" type="button"> <i
                                class="la la-plus"></i> اضافة متغير جديد </button>
                        <button class="btn btn-danger btn-sm pull-right" wire:click="removevartant" type="button">
                            <i class="la la-minus"></i> حذف المتغير </button>
                    </div>

                @endif

                @if ($has_variant == 0)
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="manage_stock"> تتبع عدد المنتج </label>
                            <select name="manage_stock" id="manage_stock" class="form-control"
                                wire:model.live='manage_stock'>
                                <option value="0" selected> لا </option>
                                <option value="1"> نعم </option>
                            </select>
                        </div>
                        @error('manage_stock')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="price"> سعر المنتج </label>
                            <input wire:model.live='price' type="number" step="0.01" id="price"
                                class="form-control" placeholder=" سعر المنتج   ">
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    @if ($manage_stock == 1)
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="qty"> الكمية </label>
                                <input wire:model.live='qty' type="number" id="qty" class="form-control"
                                    placeholder=" الكمية ">
                                @error('qty')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    @endif
                @endif

                @if ($has_discount == 1)
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="discount"> قيمة الخصم </label>
                            <input wire:model.live='discount' type="number" id="discount" class="form-control"
                                placeholder=" قيمة الخصم  ">
                            @error('discount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="start_discount"> بداية الخصم </label>
                            <input wire:model.live='start_discount' type="date" id="start_discount"
                                class="form-control" placeholder=" بداية الخصم  ">
                            @error('start_discount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="end_discount"> نهاية الخصم </label>
                            <input wire:model.live='end_discount' type="date" id="end_discount"
                                class="form-control" placeholder=" بداية الخصم  ">
                            @error('end_discount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                @endif


                <div class="form-actions">
                    <button type="button" wire:click='secondStepSubmit' class="btn btn-primary">
                        <i class="la la-check-square-o"></i> التالي
                    </button>
                    <button type="button" wire:click='backstep(1)' class="mr-1 btn btn-warning">
                        <i class="ft-x"></i> رجوع
                    </button>

                </div>
            </div>
            {{--  Start Step 3 Images   --}}
            <div class="row {{ $currentStep != 3 ? 'displaynone' : '' }}">
                <div class="col-12">
                    <h4> مرفقات المنتج </h4>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="images"> صور المنتج </label>
                        <input wire:model.live='images' type="file" id="images" multiple class="form-control">
                        @error('images')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-12 d-flex">
                    {{--  Image Preview With LiveWire --}}
                    @if ($images)
                        @foreach ($images as $key => $image)
                            <div class="d-flex flex-column">
                                <img src="{{ $image->temporaryUrl() }}" alt=""
                                    class="img-thumbnail img-fluid" width="200" height="200">
                                <div class="d-flex justify-content-between">
                                    <button type="button" class="btn btn-danger btn-sm d-inline"
                                        wire:click='deleteImage({{ $key }})'> <i class="fa fa-trash"></i>
                                    </button>
                                    <button type="button" class="btn btn-primary btn-sm d-inline"
                                        wire:click='showFullScreen({{ $key }})'> <i class="fa fa-eye"></i>
                                    </button>
                                </div>

                            </div>
                        @endforeach
                </div>
                @endif
                {{-- Full Screen Model  --}}
                <!-- Modal -->
                <div class="modal fade" id="fullscreenModel" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <img style="max-width: 100%" src="{{ $fullScreenImages }}" alt="">

                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <button type="button" wire:click='thirdStepSubmit' class="btn btn-primary">
                        <i class="la la-check-square-o"></i> التالي
                    </button>
                    <button type="button" wire:click='backstep(2)' class="mr-1 btn btn-warning">
                        <i class="ft-x"></i> رجوع
                    </button>

                </div>
            </div>
            {{--  Start Step 4 confirmation   --}}
            <div class="row {{ $currentStep != 4 ? 'displaynone' : '' }}">
                <div class="col-12">
                    <h4> تاكيد البيانات </h4>
                </div>


                <div class="form-actions">
                    <button type="button" wire:click='submitForm' class="btn btn-primary">
                        <i class="la la-check-square-o"></i> حفظ البيانات
                    </button>
                    <button type="button" wire:click='backstep(3)' class="mr-1 btn btn-warning">
                        <i class="ft-x"></i> رجوع
                    </button>

                </div>
            </div>

        </div>
        </div>

    </form>

</section>
