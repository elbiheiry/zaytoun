<form class="modal-content text-center ajax-form" method="put"
    action="{{ route('admin.about.heritages.update', ['heritage' => $heritage->id]) }}">
    @csrf
    @method('put')
    <div class="modal-body text-center">
        <div class="row">
            <div class="col-12">
                <img src="{{ get_image($heritage->image, 'heritages') }}" style="height : 100px !important">
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Image </label>
                    <div class="uplaod-wrap">
                        <input type='file' name="image">
                        <span class='path'></span>
                        <span class='button'>Select File</span>
                    </div>
                </div>
                <span class="text-danger">Image dimensions should be : 540 * 540
                </span>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Title (EN) </label>
                    <input type="text" class="form-control" name="title_en"
                        value="{{ $heritage->translate('en')->title }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Title (AR) </label>
                    <input type="text" class="form-control" name="title_ar"
                        value="{{ $heritage->translate('ar')->title }}">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label>Description (EN) </label>
                    <textarea class="form-control" name="description_en">{{ $heritage->translate('en')->description }}</textarea>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label>Description (AR) </label>
                    <textarea class="form-control" name="description_ar">{{ $heritage->translate('ar')->description }}</textarea>
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
