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
                        <label for="" class="col-sm-1 col-form-label mb-3 mt-3">Req</label>
                        <div class="col-md-1 mb-3 mt-3">
                            <div class="input-group">
                            <input type="number" name="sr_number" id="sr_number" class="form-control" value="{{$sr_number}}" readonly required>
                                <div class="invalid-feedback">
                                    Please Enter SR Number.
                                </div>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <label for="" class="col-sm-1 col-form-label mb-3 mt-3">الرقم المدني</label>
                        <div class="col-md-1 mb-3 mt-3">
                            <div class="input-group">
                            <input type="text" name="applicant_civil_id" id="applicant_civil_id" class="form-control numaric" maxlength="12" required>
                                <div class="invalid-feedback">
                                    Please Enter Civil Number.
                                </div>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <label for="" class="col-sm-1 col-form-label mb-3 mt-3">الإسم </label>
                        <div class="col-md-7 mb-3 mt-3">
                            <div class="input-group">
                            <input type="text" name="applicant_name" id="applicant_name" class="form-control" required>
                                <div class="invalid-feedback">
                                    Please Enter Applicant Name.
                                </div>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <label for="" class="col-sm-1 col-form-label mb-3 mt-3">الإجراء</label>
                        <div class="col-md-3 mb-3 mt-3">
                            <select name="action_taken" id="action_taken" class="form-control select2" required>
                                <option>Person one</option>
                                <option>Person Two</option>
                                <option>Person Three</option>
                            </select>
                            <div class="invalid-feedback">
                                    Please Select Action Taken.
                            </div>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <label for="" class="col-sm-1 col-form-label mb-3 mt-3">حالة الطلب</label>
                        <div class="col-md-3 mb-3 mt-3">
                            <select name="action_status" id="action_status" class="form-control select2" required>
                                <option>Done</option>
                                <option>New</option>
                            </select>
                            <div class="invalid-feedback">
                                    Please Select Action Status.
                            </div>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <label for="" class="col-sm-1 col-form-label mb-3 mt-3">تاريخ الإجراء </label>
                        <div class="col-md-3 mb-3 mt-3">
                            <div class="input-group">
                            <input type="date" name="action_date" id="action_date" class="form-control" required>
                                <div class="invalid-feedback">
                                    Please Select Action Date.
                                </div>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <label for="" class="col-sm-1 col-form-label mb-3 mt-3">الدرجة العلمية</label>
                        <div class="col-md-3 mb-3 mt-3">
                            <select name="applicant_degree" id="applicant_degree" class="form-control select2" required>
                                <option>Degree one</option>
                                <option>Degree Two</option>
                                <option>Degree Three</option>
                            </select>
                            <div class="invalid-feedback">
                                    Please Select Degree.
                            </div>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <label for="" class="col-sm-1 col-form-label mb-3 mt-3">المستوى العلمي</label>
                        <div class="col-md-3 mb-3 mt-3">
                            <select name="applicant_academic" id="applicant_academic" class="form-control select2" required>
                                <option>PHD</option>
                                <option>Masters</option>
                            </select>
                            <div class="invalid-feedback">
                                    Please Select Level.
                            </div>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <label for="" class="col-sm-1 col-form-label mb-3 mt-3">المسمى الوظيفي </label>
                        <div class="col-md-3 mb-3 mt-3">
                            <select name="applicant_job_title" id="applicant_job_title" class="form-control select2" required>
                                <option>Job 1</option>
                                <option>Job 2</option>
                            </select>
                            <div class="invalid-feedback">
                                    Please Select JOB Title.
                            </div>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <label for="" class="col-sm-1 col-form-label mb-3 mt-3">CSC ملاحظات</label>
                        <div class="col-md-7 mb-3 mt-3">
                            <div class="input-group">
                                <input type="text" name="csc_organization" id="csc_organization" class="form-control" required>
                                <div class="invalid-feedback">
                                    Please Enter CSC Note.
                                </div>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <label for="" class="col-sm-1 col-form-label mb-3 mt-3">رقم الصادر</label>
                        <div class="col-md-3 mb-3 mt-3">
                            <div class="input-group">
                                <input type="text" name="outgoing_letter_number" id="outgoing_letter_number" class="form-control numaric" required>
                                <div class="invalid-feedback">
                                    Please Enter Organization Number.
                                </div>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <label for="" class="col-sm-1 col-form-label mb-3 mt-3">المصدر</label>
                        <div class="col-md-3 mb-3 mt-3">
                            <select name="source_name" id="source_name" class="form-control select2" required>
                                <option>Source one</option>
                                <option>Source Two</option>
                                <option>Source Three</option>
                            </select>
                            <div class="invalid-feedback">
                                    Please Select Source.
                            </div>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <label for="" class="col-sm-1 col-form-label mb-3 mt-3">صفة المصدر</label>
                        <div class="col-md-3 mb-3 mt-3">
                            <select name="source_description" id="source_description" class="form-control select2" required>
                                <option>Description 1</option>
                                <option>Description 2</option>
                            </select>
                            <div class="invalid-feedback">
                                    Please Select Description.
                            </div>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <label for="" class="col-sm-1 col-form-label mb-3 mt-3">السكرتير</label>
                        <div class="col-md-3 mb-3 mt-3">
                            <div class="input-group">
                                <input type="text" name="source_secreatary_name" id="source_secreatary_name" class="form-control" required>
                                <div class="invalid-feedback">
                                    Please Enter Secreatary Name.
                                </div>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <label for="" class="col-sm-1 col-form-label mb-3 mt-3">هاتف السكرتير </label>
                        <div class="col-md-3 mb-3 mt-3">
                            <div class="input-group">
                                <input type="text" name="secreatary_mobile" id="secreatary_mobile" class="form-control numaric" maxlength="9" required>
                                <div class="invalid-feedback">
                                    Please Enter Secreatary Number.
                                </div>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <label for="" class="col-sm-1 col-form-label mb-3 mt-3">No.req</label>
                        <div class="col-md-1 mb-3 mt-3">
                            <div class="input-group">
                                <input type="text" name="current_request" id="current_request" class="form-control numaric" maxlength="3" required>
                                <div class="invalid-feedback">
                                    Please Enter No Of Request.
                                </div>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <label for="" class="col-sm-1 col-form-label mb-3 mt-3">Rem.req </label>
                        <div class="col-md-1 mb-3 mt-3">
                            <div class="input-group">
                                <input type="text" name="remaining_request" id="remaining_request" class="form-control numaric" maxlength="3" required>
                                <div class="invalid-feedback">
                                    Please Enter Remaining Request.
                                </div>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <label for="" class="col-sm-1 col-form-label mb-3 mt-3">Add.req</label>
                        <div class="col-md-1 mb-3 mt-3">
                            <div class="input-group">
                                <input type="text" name="additional_request" id="additional_request" class="form-control numaric" maxlength="3" required>
                                <div class="invalid-feedback">
                                    Please Enter Additional Request.
                                </div>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <label for="" class="col-sm-1 col-form-label mb-3 mt-3">Tot.req  </label>
                        <div class="col-md-1 mb-3 mt-3">
                            <div class="input-group">
                                <input type="text" name="total_request" id="total_request" class="form-control numaric" maxlength="3" required>
                                <div class="invalid-feedback">
                                    Please Enter Total Request.
                                </div>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <label for="" class="col-sm-1 col-form-label mb-3 mt-3">Eligible.req  </label>
                        <div class="col-md-1 mb-3 mt-3">
                            <div class="input-group">
                                <input type="text" name="eligible_requests" id="eligible_requests" class="form-control numaric" maxlength="3" required>
                                <div class="invalid-feedback">
                                    Please Enter Eligible Request.
                                </div>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <label for="" class="col-sm-1 col-form-label mb-3 mt-3">الموضوع</label>
                        <div class="col-md-3 mb-3 mt-3">
                            <select name="subject" id="subject" class="form-control select2" required>
                                <option>Subject one</option>
                                <option>Subject Two</option>
                                <option>Subject Three</option>
                            </select>
                            <div class="invalid-feedback">
                                    Please Select Subject.
                            </div>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <label for="" class="col-sm-1 col-form-label mb-3 mt-3">من قطاع</label>
                        <div class="col-md-3 mb-3 mt-3">
                            <select name="from_sector" id="from_sector" class="form-control select2" required>
                                <option>Sector one</option>
                                <option>Sector Two</option>
                                <option>Sector Three</option>
                            </select>
                            <div class="invalid-feedback">
                                    Please Select From Sector.
                            </div>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <label for="" class="col-sm-1 col-form-label mb-3 mt-3">إدارة</label>
                        <div class="col-md-3 mb-3 mt-3">
                            <select name="from_department" id="from_department" class="form-control select2" required>
                                <option>Department one</option>
                                <option>Department Two</option>
                                <option>Department Three</option>
                            </select>
                            <div class="invalid-feedback">
                                    Please Select Department.
                            </div>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <label for="" class="col-sm-1 col-form-label mb-3 mt-3">Attachment </label>
                        <div class="col-md-3 mb-3 mt-3">
                            <div class="input-group">
                                <input type="file" name="attachment[]" id="attachment" class="form-control" multiple >
                                <div class="invalid-feedback">
                                    Please select Attachment.
                                </div>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <label for="" class="col-sm-1 col-form-label mb-3 mt-3">إلى قطاع</label>
                        <div class="col-md-3 mb-3 mt-3">
                            <select name="to_sector" id="to_sector" class="form-control select2" required>
                                <option>Sector one</option>
                                <option>Sector Two</option>
                                <option>Sector Three</option>
                            </select>
                            <div class="invalid-feedback">
                                    Please Select Sector.
                            </div>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <label for="" class="col-sm-1 col-form-label mb-3 mt-3">إدارة</label>
                        <div class="col-md-3 mb-3 mt-3">
                            <select name="to_department" id="to_department" class="form-control select2" required>
                                <option>Department one</option>
                                <option>Department Two</option>
                                <option>Department Three</option>
                            </select>
                            <div class="invalid-feedback">
                                    Please Select Department.
                            </div>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <label for="" class="col-sm-1 col-form-label mb-3 mt-3">ملاحظات</label>
                        <div class="col-md-11 mb-3 mt-3">
                            <textarea name="general_notes" cols="147"> </textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <label for="" class="col-sm-1 col-form-label mb-3 mt-3">ملاحظات</label>
                        <div class="col-md-11 mb-3 mt-3"> 
                            <textarea name="special_notes" cols="147"> </textarea>
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