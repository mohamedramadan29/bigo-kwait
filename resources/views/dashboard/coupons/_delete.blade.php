<!-- Modal -->
<div class="text-left modal fade" id="deletecoupon{{ $coupon->id }}" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel10" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger white">
                <h4 class="modal-title white" id="myModalLabel10">
                    حذف الكوبون </h4>
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5> هل انت متاكد من حذف الكوبون </h5>

                <form action="{{ route('dashboard.coupons.destroy', $coupon->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div>
                        <label> الكود </label>
                        <input type="text" disabled class="form-control" name="code" value="{{ $coupon->code }}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">رجوع
                        </button>
                        <button type="submit" class="btn btn-outline-danger"> حذف </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
