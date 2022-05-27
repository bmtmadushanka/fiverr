@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
            <a href="{{ url()->previous() }}" class="btn btn-secondary" style="float: right;">Back</a>
            </div>
            <div class="card-body" style=" background-color:#d9eff6;">
            <form action="{{ route('user.update', $user->id) }}" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                    @csrf
                    <div class="row form-row" style="background-color:grey">
                        <h5>VIP Order Tracking System</h5>
                    </div>
                    <div class="row form-row">
                        <label for="" class="col-sm-1 col-form-label mb-3 mt-3">User Name</label>
                        <div class="col-md-4 mb-3 mt-3">
                            <div class="input-group">
                            <input type="text" name="name" id="name" value="{{$user->name}}" class="form-control" required>
                                <div class="invalid-feedback">
                                    Please Enter Name.
                                </div>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <label for="" class="col-sm-1 col-form-label mb-3 mt-3">User Email</label>
                        <div class="col-md-4 mb-3 mt-3">
                            <div class="input-group">
                            <input type="email" name="email" id="email" value="{{$user->email}}" class="form-control" required>
                                <div class="invalid-feedback">
                                    Please Enter Email.
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
                            <input type="password" name="password" id="password" class="form-control" autocomplete="off" value="">
                                <div class="invalid-feedback">
                                    Please Enter Password.
                                </div>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-row">
                        <label for="" class="col-sm-1 col-form-label mb-3 mt-3">Image</label>
                        <div class="col-md-4 mb-3 mt-3">
                            <div class="input-group">
                            <input type="file" name="user_image" id="user_image" class="form-control">
                                <div class="invalid-feedback">
                                    Please select Image.
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
                                <select class="form-control" id="role" name="role">
                                    <option>Select</option>
                                    @foreach($roles as $data)
                                        <option value="{{$data->id}}" @if($user->id == $data->id)selected @endif>{{$data->role}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Please Select Role.
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
                                                    <input type="checkbox" class="custom-control-input" name="permission_id[]" id="checkAll" @if(isset($selected_user_permission)) @if(in_array('1', $selected_user_permission)) checked @endif @endif value="1">
                                                <label class="custom-control-label" for="checkAll"> All </label>
                                            </div>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="permission_id[]" id="permission_id_2" @if(isset($selected_user_permission)) @if(in_array('2', $selected_user_permission)) checked @endif @endif value="2">
                                                <label class="custom-control-label" for="permission_id_2"> Dashboard </label>
                                            </div>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="permission_id[]" id="permission_id_3" @if(isset($selected_user_permission)) @if(in_array('3', $selected_user_permission)) checked @endif @endif value="3">
                                                <label class="custom-control-label" for="permission_id_3"> Requests </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="permission_id[]" id="permission_id_31" @if(isset($selected_user_permission)) @if(in_array('31', $selected_user_permission)) checked @endif @endif value="31">
                                                <label class="custom-control-label" for="permission_id_31"> Request Create</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="permission_id[]" id="permission_id_32" @if(isset($selected_user_permission)) @if(in_array('32', $selected_user_permission)) checked @endif @endif value="32">
                                                <label class="custom-control-label" for="permission_id_32"> Request Edit</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="permission_id[]" id="permission_id_33" @if(isset($selected_user_permission)) @if(in_array('33', $selected_user_permission)) checked @endif @endif value="33">
                                                <label class="custom-control-label" for="permission_id_33"> Request Delete</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="permission_id[]" id="permission_id_34" @if(isset($selected_user_permission)) @if(in_array('34', $selected_user_permission)) checked @endif @endif value="34">
                                                <label class="custom-control-label" for="permission_id_34"> Request History</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="permission_id[]" id="permission_id_4" @if(isset($selected_user_permission)) @if(in_array('4', $selected_user_permission)) checked @endif @endif value="4">
                                                <label class="custom-control-label" for="permission_id_4"> Fields </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="permission_id[]" id="permission_id_41" @if(isset($selected_user_permission)) @if(in_array('41', $selected_user_permission)) checked @endif @endif value="41">
                                                <label class="custom-control-label" for="permission_id_41"> Field Create</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="permission_id[]" id="permission_id_42" @if(isset($selected_user_permission)) @if(in_array('42', $selected_user_permission)) checked @endif @endif value="42">
                                                <label class="custom-control-label" for="permission_id_42"> Field Delete</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="permission_id[]" id="permission_id_43" @if(isset($selected_user_permission)) @if(in_array('43', $selected_user_permission)) checked @endif @endif value="43">
                                                <label class="custom-control-label" for="permission_id_43"> Field Upload</label>
                                            </div>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="permission_id[]" id="permission_id_5" @if(isset($selected_user_permission)) @if(in_array('5', $selected_user_permission)) checked @endif @endif value="5">
                                                <label class="custom-control-label" for="permission_id_5"> Roles </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="permission_id[]" id="permission_id_51" @if(isset($selected_user_permission)) @if(in_array('51', $selected_user_permission)) checked @endif @endif value="51">
                                                <label class="custom-control-label" for="permission_id_51"> Role Create</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="permission_id[]" id="permission_id_52" @if(isset($selected_user_permission)) @if(in_array('52', $selected_user_permission)) checked @endif @endif value="52">
                                                <label class="custom-control-label" for="permission_id_52"> Role Edit</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="permission_id[]" id="permission_id_53" @if(isset($selected_user_permission)) @if(in_array('53', $selected_user_permission)) checked @endif @endif value="53">
                                                <label class="custom-control-label" for="permission_id_53"> Role Delete</label>
                                            </div>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="permission_id[]" id="permission_id_6" @if(isset($selected_user_permission)) @if(in_array('6', $selected_user_permission)) checked @endif @endif value="6">
                                                <label class="custom-control-label" for="permission_id_6"> Users </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="permission_id[]" id="permission_id_61" @if(isset($selected_user_permission)) @if(in_array('61', $selected_user_permission)) checked @endif @endif value="61">
                                                <label class="custom-control-label" for="permission_id_61"> User Create</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="permission_id[]" id="permission_id_62" @if(isset($selected_user_permission)) @if(in_array('62', $selected_user_permission)) checked @endif @endif value="62">
                                                <label class="custom-control-label" for="permission_id_62"> User Edit</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="permission_id[]" id="permission_id_63" @if(isset($selected_user_permission)) @if(in_array('63', $selected_user_permission)) checked @endif @endif value="63">
                                                <label class="custom-control-label" for="permission_id_63"> User Delete</label>
                                            </div>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="permission_id[]" id="permission_id_7" @if(isset($selected_user_permission)) @if(in_array('7', $selected_user_permission)) checked @endif @endif value="7">
                                                <label class="custom-control-label" for="permission_id_7"> Users Info</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="permission_id[]" id="permission_id_71" @if(isset($selected_user_permission)) @if(in_array('71', $selected_user_permission)) checked @endif @endif value="71">
                                                <label class="custom-control-label" for="permission_id_71"> User Info edit</label>
                                            </div>
                                        </td>
                                        <td>
                                           
                                        </td>
                                        <td>
                                          
                                        </td>
                                        <td></td>
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

    $('#role').on('change', function (e) {
            var optionSelected = $("option:selected", this);
            var valueSelected = this.value;
            var data = [];
            data.push({
                'name': 'role_id',
                'value': valueSelected,
            }, {
                'name': '_token',
                'value': "{{csrf_token()}}"
            });
            $.ajax({
                url: "{{ route('role.permission') }}",
                type: 'post',
                dataType: 'json',
                data: data,
                success: function (result) {
                   
                    $('input[type=checkbox]').each(function () {
                        if (result.selected_permissions.includes($(this).val())) {
                            //   console.log($(this).val(),element);
                            $(this).prop('checked', true);
                        } else {
                            $(this).prop('checked', false);
                        }

                    });

                }
            });
        });
</script>
@endsection