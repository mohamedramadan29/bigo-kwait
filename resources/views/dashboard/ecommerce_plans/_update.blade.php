<!-- Modal -->
<div class="text-left modal fade" id="update_plan_{{ $plan->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel10"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary white">
                <h4 class="modal-title white" id="myModalLabel10">
                    تعديل خطة </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('dashboard.ecommerce-plans.update',$plan->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label> اسم الخطة </label>
                        <input type="text" class="form-control" name="name" value="{{ old('name',$plan->name) }}">
                    </div>
                    <div class="form-group">
                        <label> نوع الخطة </label>
                        <select class="form-control" name="type">
                            <option value="" selected disabled> -- نوع الخطة -- </option>
                            <option @selected(old('type',$plan->type) == 'store') value="store"> متجر الكتروني  </option>
                            <option @selected(old('type',$plan->type) == 'payment_gateway') value="payment_gateway"> بوابات دفع  </option>
                            <option @selected(old('type',$plan->type) == 'shipping_service') value="shipping_service"> خدمات الشحن </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label> الوصف </label>
                        <textarea class="form-control" name="description">{{ old('description',$plan->description) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label> المميزات <span class="badge badge-danger"> مفصولة ب # </span> </label>
                        <textarea class="form-control" name="features">{{ old('features',$plan->features) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label> السعر </label>
                        <input type="number" step="0.01" class="form-control" name="price" value="{{ old('price',$plan->price) }}">
                    </div>
                    <div class="form-group">
                        <label> عدد الايام </label>
                        <input type="number" class="form-control" name="duration_days"
                            value="{{ old('duration_days',$plan->duration_days) }}">
                    </div>
                    <div class="form-group">
                        <label> الحالة </label>
                        <select class="form-control" name="is_active">
                            <option value="" selected disabled> -- حدد الحالة -- </option>
                            <option @selected(old('is_active',$plan->is_active) == 1) value="1">نشط</option>
                            <option @selected(old('is_active',$plan->is_active) == 0) value="0">غير نشط</option>
                        </select>
                    </div>
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">رجوع
                        </button>
                        <button type="submit" class="btn btn-outline-primary"> تعديل </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
