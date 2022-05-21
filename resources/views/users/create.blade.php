@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
            <a href="{{ url()->previous() }}" class="btn btn-secondary" style="float: right;">Back</a>
            </div>
            <div class="card-body" style=" background-color:#d9eff6;">
                <form action="{{ route('application.store') }}" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                    @csrf
                    <div class="row form-row" style="background-color:grey">
                        <h5>VIP Order Tracking System</h5>
                    </div>
                    <div class="row form-row">
                        <label for="" class="col-sm-1 col-form-label mb-3 mt-3">User Name</label>
                        <div class="col-md-4 mb-3 mt-3">
                            <div class="input-group">
                            <input type="text" name="applicant_civil_id" id="applicant_civil_id" class="form-control" required>
                                <div class="invalid-feedback">
                                    Please Enter Role.
                                </div>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <label for="" class="col-sm-1 col-form-label mb-3 mt-3">User Email</label>
                        <div class="col-md-4 mb-3 mt-3">
                            <div class="input-group">
                            <input type="email" name="applicant_civil_id" id="applicant_civil_id" class="form-control" required>
                                <div class="invalid-feedback">
                                    Please Enter Role.
                                </div>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-row">
                        <label for="" class="col-sm-1 col-form-label mb-3 mt-3">Password</label>
                        <div class="col-md-4 mb-3 mt-3">
                            <div class="input-group">
                            <input type="password" name="applicant_civil_id" id="applicant_civil_id" class="form-control" required>
                                <div class="invalid-feedback">
                                    Please Enter Role.
                                </div>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-row">
                        <label for="" class="col-sm-1 col-form-label mb-3 mt-3">Role</label>
                        <div class="col-md-4 mb-3 mt-3">
                            <div class="input-group">
                                <select class="form-control">
                                    <option>Select</option>
                                    <option>Admin</option>
                                    <option>Small select</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please Enter Role.
                                </div>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="col-md-12">
                            <table class="table">

                                <tbody>
                                    <tr>
                                        <td>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="user_permission_id[]" id="checkAll">
                                                <label class="custom-control-label" for="checkAll"> All </label>
                                            </div>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="user_permission_id[]" id="user_permission_id_1" value="1">
                                                <label class="custom-control-label" for="user_permission_id_1"> Dashboard </label>
                                            </div>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="user_permission_id[]" id="user_permission_id_2" value="2">
                                                <label class="custom-control-label" for="user_permission_id_2"> Requests </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="user_permission_id[]" id="user_permission_id_21" value="21">
                                                <label class="custom-control-label" for="user_permission_id_21"> Request Create</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="user_permission_id[]" id="user_permission_id_22" value="22">
                                                <label class="custom-control-label" for="user_permission_id_22"> Request Edit</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="user_permission_id[]" id="user_permission_id_23" value="23">
                                                <label class="custom-control-label" for="user_permission_id_23"> Request Delete</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="user_permission_id[]" id="user_permission_id_3" value="3">
                                                <label class="custom-control-label" for="user_permission_id_3"> Roles </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="user_permission_id[]" id="user_permission_id_31" value="31">
                                                <label class="custom-control-label" for="user_permission_id_31"> Role Create</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="user_permission_id[]" id="user_permission_id_32" value="32">
                                                <label class="custom-control-label" for="user_permission_id_32"> Role Edit</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="user_permission_id[]" id="user_permission_id_33" value="33">
                                                <label class="custom-control-label" for="user_permission_id_33"> Role Delete</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="user_permission_id[]" id="user_permission_id_4" value="4">
                                                <label class="custom-control-label" for="user_permission_id_4"> Users </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="user_permission_id[]" id="user_permission_id_41" value="41">
                                                <label class="custom-control-label" for="user_permission_id_41"> User Create</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="user_permission_id[]" id="user_permission_id_42" value="42">
                                                <label class="custom-control-label" for="user_permission_id_42"> User Edit</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="user_permission_id[]" id="user_permission_id_43" value="43">
                                                <label class="custom-control-label" for="user_permission_id_43"> User Delete</label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
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
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
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