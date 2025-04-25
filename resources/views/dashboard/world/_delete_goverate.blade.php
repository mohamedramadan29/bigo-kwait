<!-- Modal -->
<div class="text-left modal fade" id="delete_governorate_{{ $gov->id }}" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel10" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger white">
                <h4 class="modal-title white" id="myModalLabel10">
                    حذف المحافظة </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5> هل انت متاكد من حذف المحافظة </h5>

                <form action="{{ route('dashboard.shipping.destroy-governorate', $gov->id) }}" method="POST">
                    @csrf
                    <div>
                        <label> المحافظة </label>
                        <input type="text" disabled class="form-control" name="governorate" value="{{ $gov->name }}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">رجوع
                        </button>
                        <button type="submit" class="btn btn-outline-danger"> حذف المحافظة </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
