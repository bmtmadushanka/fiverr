<div class="form-row">
    <label for="" class="col-sm-1 col-form-label mb-3 mt-3">Notes</label>
    <div class="col-md-3 mb-3 mt-3">
        <select name="" id="note_select" class="form-control">
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
        <input type="text" name="" id="note_name" class="form-control ">
        <div class="invalid-feedback">
            Please Select Action Status.
        </div>
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>
    <div class="col-md-4 mb-3 mt-3">
        <button type="button" id="note_delete_btn" class="btn btn-danger mr-2">Delete</button>
        <button type="button" id="note_crete_btn" class="btn btn-success mr-2">Add</button>
        <button type="button" id="note_upload_btn" class="btn btn-info mr-2" disabled>Upload</button>
        <div class="fileUpload btn btn-primary">
            <span id="note_upload_span">Choose</span>
            <input id="note_upload_file" type="file" class="upload"/>
        </div>

    </div>
</div>
