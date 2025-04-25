<!-- Modal -->
<div class="text-left modal fade" id="delete_country_{{ $country->id }}" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel10" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger white">
                <h4 class="modal-title white" id="myModalLabel10">
                    حذف الدولة </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5> هل انت متاكد من حذف الدولة </h5>

                <form action="{{ route('dashboard.shipping.destroy-country', $country->id) }}" method="POST">
                    @csrf
                    <div>
                        <label> الدولة </label>
                        <input type="text" disabled class="form-control" name="country" value="{{ $country->name }}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">رجوع
                        </button>
                        <button type="submit" class="btn btn-outline-danger"> حذف الدولة </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
