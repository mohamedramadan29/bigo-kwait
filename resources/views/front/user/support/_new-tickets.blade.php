<!-- Modal -->
<div class="modal fade" id="newticket" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"> اضافة تذكرة </h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Validation Errors -->
                <div class="alert alert-danger" id='error_div' style="display: none;">
                    <ul id="error_list">
                    </ul>
                </div>
                <form action="{{ route('user.support.new-ticket') }}" id="newticket_form" method="post">
                    @csrf
                    <div class="form-group">
                        <label for=""> عنوان التذكرة </label>
                        <input type="text" required class="form-control" name="subject" value="{{ old('subject') }}">
                        <strong class="text-danger" id="subject_error"></strong>
                    </div>
                    <div class="form-group">
                        <label for=""> الرسالة </label>
                        <textarea name="message" required id="" cols="30" rows="10" class="form-control">{{ old('message') }}</textarea>
                        <strong class="text-danger" id="message_error"></strong>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> رجوع </button>
                        <button type="submit" class="btn btn-primary"> ارسال التذكرة </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
