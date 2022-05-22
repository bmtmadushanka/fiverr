<div class="form-row">
    <label for="" class="col-sm-1 col-form-label mb-3 mt-3">Educations</label>
    <div class="col-md-3 mb-3 mt-3">
        <select name="" id="non_csc_edu_select" class="form-control">
        </select>
        <div class="invalid-feedback">
            Please Select Action Taken.
        </div>
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>
    <label for="" class="col-sm-1 col-form-label mb-3 mt-3"></label>
    <div class="col-md-3 mb-3 mt-3">
        <input type="text" name="" id="non_csc_edu_name" class="form-control ">
        <div class="invalid-feedback">
            Please Select Action Status.
        </div>
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>
    <div class="col-md-4 mb-3 mt-3">
        <button type="button" id="non_csc_edu_delete_btn" class="btn btn-danger mr-2">Delete</button>
        <button type="button" id="non_csc_edu_crete_btn" class="btn btn-success mr-2">Add</button>
        <button type="button" data-action="{{route('education.import')}}" data-input_name="non_csc_edu_upload_file" id="non_csc_edu_upload_btn" class="btn btn-info mr-2 upload_btn" disabled>Upload</button>
        <div class="fileUpload btn btn-primary">
            <span class="input_name">Choose</span>
            <input id="non_csc_edu_upload_file" type="file" class="upload" data-btn_name="non_csc_edu_upload_btn"/>
        </div>

    </div>
</div>
