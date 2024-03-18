<form class="modal-content text-center ajax-form" method="put"
    action="{{ route('admin.about.values.update', ['id' => $value->id]) }}">
    @csrf
    @method('put')
    <div class="modal-body text-center">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label>Icon </label>
                    <input type="text" class="form-control" name="icon" value="{{ $value->icon }}">
                </div>
                <span class="text-danger">Please , visit this link to get your preffered icon <a
                        href="https://fontawesome.com/icons?d=gallery"
                        target="_blank">https://fontawesome.com/icons?d=gallery</a>
                </span>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Name (EN) </label>
                    <input type="text" class="form-control" name="name_en"
                        value="{{ $value->translate('en')->name }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Name (AR) </label>
                    <input type="text" class="form-control" name="name_ar"
                        value="{{ $value->translate('ar')->name }}">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label>Description (EN) </label>
                    <input type="text" class="form-control" name="description_en"
                        value="{{ $value->translate('en')->description }}">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label>Description (AR) </label>
                    <input type="text" class="form-control" name="description_ar"
                        value="{{ $value->translate('ar')->description }}">
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer text-center">
        <button class="custom-btn" type="submit">
            <i class="fa fa-plus"></i> Save change
        </button>
        <button type="button" class="custom-btn red-bc" data-dismiss="modal">
            <i class="fa fa-times"></i> Close
        </button>
    </div>
</form>
