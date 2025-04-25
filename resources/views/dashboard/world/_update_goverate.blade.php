<!-- Modal -->
<div class="text-left modal fade" id="update_goverate_{{ $gov->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel10"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary white">
                <h4 class="modal-title white" id="myModalLabel10">
                    تعديل محافظة </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('dashboard.shipping.update-governorate', $gov->id) }}" method="POST">
                    @csrf
                    <div>
                        <label> اسم المحافظة </label>
                        <input type="text" class="form-control" name="name" value="{{ old('name',$gov->name) }}">
                    </div>
                    <div>
                        <label> سعر الشحن </label>
                        <input type="number" step="0.01" class="form-control" name="price" value="{{ old('price',$gov->price) }}">
                    </div>
                    <div>
                        <label> الحالة </label>
                        <select class="form-control" name="is_active">
                            <option value="" selected disabled> -- حدد الحالة -- </option>
                            <option @selected(old('is_active',$gov->is_active) == 1) value="1">نشط</option>
                            <option @selected(old('is_active',$gov->is_active) == 0) value="0">غير نشط</option>
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
