@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary" style="float: right;">Back</a>
                </div>
                <div class="card-body" style=" background-color:#d9eff6;">
                    <form {{--action="{{ route('application.store') }}"--}} method="POST" class="needs-validation"
                          novalidate enctype="multipart/form-data">
                        @csrf
                        <div class="row form-row" style="background-color:grey">
                            <h5>VIP Order Tracking System - Field Control</h5>
                        </div>

                        <div class="form-row">
                            <label for="" class="col-sm-1 col-form-label mb-3 mt-3">Educations</label>
                            <div class="col-md-3 mb-3 mt-3">
                                <select name="" id="edu_select" class="form-control">
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
                                <input type="text" name="" id="edu_name" class="form-control ">
                                <div class="invalid-feedback">
                                    Please Select Action Status.
                                </div>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-4 mb-3 mt-3">
                                <button type="button" id="edu_delete_btn" class="btn btn-danger mr-2">Delete</button>
                                <button type="button" id="edu_crete_btn" class="btn btn-success mr-2">Add</button>
                                <button type="button" data-action="{{route('education.import')}}" id="edu_upload_btn" class="btn btn-info mr-2" disabled>Upload</button>
                                <div class="fileUpload btn btn-primary">
                                    <span id="edu_upload_span">Choose</span>
                                    <input id="edu_upload_file" type="file" class="upload"/>
                                </div>

                            </div>
                        </div>
                        <div class="form-row">
                            <label for="" class="col-sm-1 col-form-label mb-3 mt-3">Notes</label>
                            <div class="col-md-3 mb-3 mt-3">
                                <select name="" id="" class="form-control select2" required>
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
                                <input name="" id="" class="form-control select2" required>
                                <div class="invalid-feedback">
                                    Please Select Action Status.
                                </div>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-3 mb-3 mt-3">
                                <button type="button" id="" class="btn btn-danger mr-2">Delete</button>
                                <button type="button" id="" class="btn btn-success mr-2">Add</button>
                            </div>
                        </div>
                        <div class="form-row">
                            <label for="" class="col-sm-1 col-form-label mb-3 mt-3">Sectors</label>
                            <div class="col-md-3 mb-3 mt-3">
                                <select name="" id="" class="form-control select2" required>
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
                                <input name="" id="" class="form-control select2" required>
                                <div class="invalid-feedback">
                                    Please Select Action Status.
                                </div>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-3 mb-3 mt-3">
                                <button type="button" id="" class="btn btn-danger mr-2">Delete</button>
                                <button type="button" id="" class="btn btn-success mr-2">Add</button>
                            </div>
                        </div>
                        <div class="form-row">
                            <label for="" class="col-sm-1 col-form-label mb-3 mt-3">Departments</label>
                            <div class="col-md-3 mb-3 mt-3">
                                <select name="" id="" class="form-control select2" required>
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
                                <input name="" id="" class="form-control select2" required>
                                <div class="invalid-feedback">
                                    Please Select Action Status.
                                </div>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-3 mb-3 mt-3">
                                <button type="button" id="" class="btn btn-danger mr-2">Delete</button>
                                <button type="button" id="" class="btn btn-success mr-2">Add</button>
                            </div>
                        </div>

                        {{--Default row -- uncomment or copy if need to add new row--}}
                        {{--<div class="form-row">
                            <label for="" class="col-sm-1 col-form-label mb-3 mt-3">Educations</label>
                            <div class="col-md-3 mb-3 mt-3">
                                <select name="" id="" class="form-control select2" required>
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
                                <input name="" id="" class="form-control select2" required>
                                <div class="invalid-feedback">
                                        Please Select Action Status.
                                </div>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-3 mb-3 mt-3">
                                <button type="button" id="" class="btn btn-danger mr-2" >Delete</button>
                                <button type="button" id="" class="btn btn-success mr-2" >Add</button>
                            </div>
                        </div>--}}

                        <div class="form-row">
                            <button class="btn btn-success mb-3 mt-3" type="submit">Save Details</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/field_control.js')}}"></script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict';
            window.addEventListener('load', function () {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
@endsection
