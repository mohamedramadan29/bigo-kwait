<!-- Modal -->
<div class="text-left modal fade" id="add_country" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel10" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary white">
                <h4 class="modal-title white" id="myModalLabel10">
                     اضافة دولة  </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('dashboard.shipping.create-country') }}" method="POST">
                    @csrf
                    <div>
                        <label> حدد المتجر </label>
                        <input type="text" class="form-control" name="store_id" value="1">
                    </div>
                    <div>
                        <label> اسم الدولة </label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                    </div>
                    <div>
                        <label> الكود </label>
                        <input type="text" class="form-control" name="phone_code" value="{{ old('phone_code') }}">
                    </div>
                    <div>
                        <label> الحالة </label>
                        <select class="form-control" name="is_active">
                            <option value="" selected disabled> -- حدد الحالة -- </option>
                            <option @selected(old('is_active') == 1) value="1">نشط</option>
                            <option @selected(old('is_active') == 0) value="0">غير نشط</option>
                        </select>
                    </div>
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">رجوع
                        </button>
                        <button type="submit" class="btn btn-outline-primary"> اضافة </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
