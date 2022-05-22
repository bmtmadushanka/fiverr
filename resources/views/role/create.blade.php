@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
            <a href="{{ url()->previous() }}" class="btn btn-secondary" style="float: right;">Back</a>
            </div>
            <div class="card-body" style=" background-color:#d9eff6;">
                <form action="{{ route('role.store') }}" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                    @csrf
                    <div class="row form-row" style="background-color:grey">
                        <h5>VIP Order Tracking System</h5>
                    </div>
                    <div class="row form-row">
                        <label for="" class="col-sm-1 col-form-label mb-3 mt-3">Role</label>
                        <div class="col-md-6 mb-3 mt-3">
                            <div class="input-group">
                            <input type="text" name="role" id="role" class="form-control"  required>
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
                                                    <input type="checkbox" class="custom-control-input" name="permission_id[]" id="checkAll" value="1">
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
                                                    <input type="checkbox" class="custom-control-input" name="permission_id[]" id="permission_id_2" value="2">
                                                <label class="custom-control-label" for="permission_id_2"> Dashboard </label>
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
                                                    <input type="checkbox" class="custom-control-input" name="permission_id[]" id="permission_id_3" value="3">
                                                <label class="custom-control-label" for="permission_id_3"> Requests </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="permission_id[]" id="permission_id_31" value="31">
                                                <label class="custom-control-label" for="permission_id_31"> Request Create</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="permission_id[]" id="permission_id_32" value="32">
                                                <label class="custom-control-label" for="permission_id_32"> Request Edit</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="permission_id[]" id="permission_id_33" value="33">
                                                <label class="custom-control-label" for="permission_id_33"> Request Delete</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="permission_id[]" id="permission_id_4" value="4">
                                                <label class="custom-control-label" for="permission_id_4"> Fields </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="permission_id[]" id="permission_id_41" value="41">
                                                <label class="custom-control-label" for="permission_id_41"> Field Create</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="permission_id[]" id="permission_id_42" value="42">
                                                <label class="custom-control-label" for="permission_id_42"> Field Delete</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="permission_id[]" id="permission_id_43" value="43">
                                                <label class="custom-control-label" for="permission_id_43"> Field Upload</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="permission_id[]" id="permission_id_5" value="5">
                                                <label class="custom-control-label" for="permission_id_5"> Roles </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="permission_id[]" id="permission_id_51" value="51">
                                                <label class="custom-control-label" for="permission_id_51"> Role Create</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="permission_id[]" id="permission_id_52" value="52">
                                                <label class="custom-control-label" for="permission_id_52"> Role Edit</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="permission_id[]" id="permission_id_53" value="53">
                                                <label class="custom-control-label" for="permission_id_53"> Role Delete</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="permission_id[]" id="permission_id_6" value="6">
                                                <label class="custom-control-label" for="permission_id_6"> Users </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="permission_id[]" id="permission_id_61" value="61">
                                                <label class="custom-control-label" for="permission_id_61"> User Create</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="permission_id[]" id="permission_id_62" value="62">
                                                <label class="custom-control-label" for="permission_id_62"> User Edit</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="permission_id[]" id="permission_id_63" value="63">
                                                <label class="custom-control-label" for="permission_id_63"> User Delete</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="permission_id[]" id="permission_id_7" value="7">
                                                <label class="custom-control-label" for="permission_id_7"> Users Info</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="permission_id[]" id="permission_id_71" value="71">
                                                <label class="custom-control-label" for="permission_id_71"> User Info edit</label>
                                            </div>
                                        </td>
                                        <td>
                                           
                                        </td>
                                        <td>
                                          
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

    $("#checkAll").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
</script>
@endsection