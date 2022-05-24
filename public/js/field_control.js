"use strict";

$(document).ready(function () {
    initEducationSelect();
    initNoteSelect();
    initSectorSelect();
    initDepartmentSelect();
    initNonCSCEducationSelect();
});

$('.upload').on('change',function () {
    $(this).parent().find('span').text('File Selected');
   // $(this).closest('span').text('File Selected');
    $('#'+$(this).data('btn_name')).attr('disabled',false);

})
// ========Educations part Begin=============//
function initEducationSelect() {
    $('#edu_select').select2({
        placeholder : 'CSC Educations',
        ajax: {
            url: '/csc-educations',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    term: params.term, // search term
                };
            },
            processResults: function (data) {
                var data_formated = [];
                data.forEach(function (item) {
                    var temp = {
                        'id': item.id,
                        'text': item.name
                    }
                    data_formated.push(temp);
                });
                return {
                    results: data_formated
                };
            }
        },
        //minimumInputLength: 1,
        minimumResultsForSearch: -1
    });
}


$('#edu_crete_btn').on('click',function () {
    var name = $('#edu_name').val();
    if (!name){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text:  'Please enter a valid Education name'
        });
        return false;
    }
    $.ajax({
        type : 'POST',
        url : '/csc-educations',
        data : {
            name : name
        },
        success : function (res) {
            show_success_response(res);
            $('#edu_name').val('');
        },
        error : function (res) {
            show_error_response(res);
        }
    });
})


$('#edu_delete_btn').on('click',function () {
    let id = $('#edu_select').val();
    if (!id){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text:  'Please select an Education'
        });
        return false;
    }
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value === true) {
            $.ajax({
                type : 'delete',
                url : '/csc-educations/'+id,
                success : function (res) {
                    $('#edu_select').empty().trigger('change')
                    show_success_response(res);
                },
                error : function (res) {
                    show_error_response(res);
                }
            });
        }
    })

})
// ========Educations part Ends=============//
// ========Educations part Begin=============//
function initNonCSCEducationSelect() {
    $('#non_csc_edu_select').select2({
        placeholder : 'Educations',
        ajax: {
            url: '/educations',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    term: params.term, // search term
                };
            },
            processResults: function (data) {
                var data_formated = [];
                data.forEach(function (item) {
                    var temp = {
                        'id': item.id,
                        'text': item.name
                    }
                    data_formated.push(temp);
                });
                return {
                    results: data_formated
                };
            }
        },
        //minimumInputLength: 1,
        minimumResultsForSearch: -1
    });
}


$('#non_csc_edu_crete_btn').on('click',function () {
    var name = $('#non_csc_edu_name').val();
    if (!name){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text:  'Please enter a valid Education name'
        });
        return false;
    }
    $.ajax({
        type : 'POST',
        url : '/educations',
        data : {
            name : name
        },
        success : function (res) {
            show_success_response(res);
            $('#non_csc_edu_name').val('');
        },
        error : function (res) {
            show_error_response(res);
        }
    });
})


$('#non_csc_edu_delete_btn').on('click',function () {
    let id = $('#non_csc_edu_select').val();
    if (!id){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text:  'Please select an Education'
        });
        return false;
    }
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value === true) {
            $.ajax({
                type : 'delete',
                url : '/educations/'+id,
                success : function (res) {
                    $('#non_csc_edu_select').empty().trigger('change')
                    show_success_response(res);
                },
                error : function (res) {
                    show_error_response(res);
                }
            });
        }
    })

})
// ========Educations part Ends=============//

// ========Notes part Begin=============//
function initNoteSelect() {
    $('#note_select').select2({
        placeholder : 'Notes',
        ajax: {
            url: '/notes',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    term: params.term, // search term
                };
            },
            processResults: function (data) {
                var data_formated = [];
                data.forEach(function (item) {
                    var temp = {
                        'id': item.id,
                        'text': item.name
                    }
                    data_formated.push(temp);
                });
                return {
                    results: data_formated
                };
            }
        },
        //minimumInputLength: 1,
        minimumResultsForSearch: -1
    });
}


$('#note_crete_btn').on('click',function () {
    var name = $('#note_name').val();

    if (!name){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text:  'Please enter a valid Note name'
        });
        return false;
    }
    $.ajax({
        type : 'POST',
        url : '/notes',
        data : {
            name : name
        },
        success : function (res) {
            show_success_response(res);
            $('#note_name').val('');
        },
        error : function (res) {
            show_error_response(res);
        }
    });
})


$('#note_delete_btn').on('click',function () {
    let id = $('#note_select').val();
    if (!id){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text:  'Please select an Note'
        });
        return false;
    }
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value === true) {
            $.ajax({
                type : 'delete',
                url : '/notes/'+id,
                success : function (res) {
                    $('#note_select').empty().trigger('change')
                    show_success_response(res);
                },
                error : function (res) {
                    show_error_response(res);
                }
            });
        }
    })

})
// ========Notes part Ends=============//
//
// ========Sectors part Begin=============//
function initSectorSelect() {
    $('#sector_select,#department_sector_select').select2({

        placeholder : 'Sectors',
        ajax: {
            url: '/sectors',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    term: params.term, // search term
                };
            },
            processResults: function (data) {
                var data_formated = [];
                data.forEach(function (item) {
                    var temp = {
                        'id': item.id,
                        'text': item.name
                    }
                    data_formated.push(temp);
                });
                return {
                    results: data_formated
                };
            }
        },
        //minimumInputLength: 1,
        minimumResultsForSearch: -1
    });
}


$('#sector_crete_btn').on('click',function () {
    var name = $('#sector_name').val();

    if (!name){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text:  'Please enter a valid Sector name'
        });
        return false;
    }
    $.ajax({
        type : 'POST',
        url : '/sectors',
        data : {
            name : name
        },
        success : function (res) {
            show_success_response(res);
            $('#sector_name').val('');
        },
        error : function (res) {
            show_error_response(res);
        }
    });
})


$('#sector_delete_btn').on('click',function () {
    let id = $('#sector_select').val();
    if (!id){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text:  'Please select a Sector'
        });
        return false;
    }
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value === true) {
            $.ajax({
                type : 'delete',
                url : '/sectors/'+id,
                success : function (res) {
                    $('#sector_select').empty().trigger('change')
                    $('#department_sector_select').empty().trigger('change')
                    show_success_response(res);
                },
                error : function (res) {
                    show_error_response(res);
                }
            });
        }
    })

})
// ========Sectors part Ends=============//
//
// ========Departments part Begin=============//
function initDepartmentSelect() {
    let sector_id = $('#department_sector_select').val();
    $('#department_select').select2({
        placeholder : 'Departments',
        ajax: {
            url: '/departments',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    term: params.term, // search term
                    sector_id : sector_id
                };
            },
            processResults: function (data) {
                var data_formated = [];
                data.forEach(function (item) {
                    var temp = {
                        'id': item.id,
                        'text': item.name
                    }
                    data_formated.push(temp);
                });
                return {
                    results: data_formated
                };
            }
        },
        //minimumInputLength: 1,
        minimumResultsForSearch: -1
    });
}

$('#department_sector_select').on('change',function () {
    initDepartmentSelect();
})


$('#department_crete_btn').on('click',function () {
    var name = $('#department_name').val();
    var sector_id = $('#department_sector_select').val();

    if (!name){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text:  'Please enter a valid Departments name'
        });
        return false;
    }
    if (!sector_id){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text:  'Please select a Sector'
        });
        return false;
    }
    $.ajax({
        type : 'POST',
        url : '/departments',
        data : {
            name : name,
            sector_id : sector_id,
        },
        success : function (res) {
            show_success_response(res);
            $('#department_name').val('');
        },
        error : function (res) {
            show_error_response(res);
        }
    });
})


$('#department_delete_btn').on('click',function () {
    let id = $('#department_select').val();
    if (!id){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text:  'Please select a Department'
        });
        return false;
    }
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value === true) {
            $.ajax({
                type : 'delete',
                url : '/departments/'+id,
                success : function (res) {
                    $('#department_selector_select').empty().trigger('change');
                    $('#department_select').empty().trigger('change');
                    show_success_response(res);
                },
                error : function (res) {
                    show_error_response(res);
                }
            });
        }
    })

})
// ========Departments part Ends=============//

//Common file import function
$('.upload_btn').on('click',function () {
    var action = $(this).data('action');
    var input_name = $(this).data('input_name');
    var select_name = $(this).data('select_name');
    if($('#'+input_name)[0].files.length == 0){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Please select file to upload'
        });
    }else{
        let file = new FormData();
        file.append('import_file',$('#'+input_name)[0].files[0]);
        $.ajax({
            type : 'post',
            url : action,
            data: file,
            processData: false,
            contentType: false,
            success : function (res) {
                $('#'+select_name).empty().trigger('change')
                $('#'+input_name).val('');
                $('#'+input_name).parent().find('span').text('Choose');
                show_success_response(res);
            },
            error : function (res) {
                show_error_response(res);
            }
        });
    }

})

