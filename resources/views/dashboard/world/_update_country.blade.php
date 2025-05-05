<!-- Modal -->
<div class="text-left modal fade" id="update_country_{{ $country->id }}" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel10" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary white">
                <h4 class="modal-title white" id="myModalLabel10">
                     تعديل دولة  </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('dashboard.shipping.update-country', $country->id) }}" method="POST">
                    @csrf
                    <div>
                        <label> حدد المتجر </label>
                        <select class="form-control" name="store_id">
                            <option value="" selected disabled> -- حدد المتجر -- </option>
                            @foreach ($stores as $store)
                                <option @selected(old('store_id') == $store->id || $country->store_id == $store->id) value="{{ $store->id }}">{{ $store->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label> اسم الدولة </label>
                        <input type="text" class="form-control" name="name" value="{{ old('name',$country->name) }}">
                    </div>
                    <div>
                        <label> الكود </label>
                        <input type="text" class="form-control" name="phone_code" value="{{ old('phone_code',$country->phone_code) }}">
                    </div>
                    <div>
                        <label> الحالة </label>
                        <select class="form-control" name="is_active">
                            <option value="" selected disabled> -- حدد الحالة -- </option>
                            <option @selected(old('is_active',$country->is_active) == 1) value="1">نشط</option>
                            <option @selected(old('is_active',$country->is_active) == 0) value="0">غير نشط</option>
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
