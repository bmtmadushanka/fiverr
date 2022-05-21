"use strict";

$(document).ready(function () {
    initEducationSelect();
});

$('.upload').on('change',function () {
    $(this).closest('span').innerText = 'Uploaded';
})
// Educations part Begin

function initEducationSelect() {
    $('#edu_select').select2({
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
    });
}


$('#edu_crete_btn').on('click',function () {
    var name = $('#edu_name').val();

    $.ajax({
        type : 'POST',
        url : '/educations',
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
    var id = $('#edu_select').val();
  //add confirm ation swal
    $.ajax({
        type : 'delete',
        url : '/educations/'+id,
        success : function (res) {
            $('#edu_select').empty().trigger('change')
            show_success_response(res);
        },
        error : function (res) {
            show_error_response(res);
        }
    });
})
$('#edu_upload_btn').on('click',function () {
    let file = new FormData();
    file.append('import_file',$('#edu_upload_file')[0].files[0]);
    $.ajax({
        type : 'post',
        url : '/educations/import',
        data: file,
        processData: false,
        contentType: false,
        success : function (res) {
            $('#edu_select').empty().trigger('change')
            show_success_response(res);
        },
        error : function (res) {
            show_error_response(res);
        }
    });
})


function show_success_response(response){
    Swal.fire('Success',response.msg,'success');
    //alert(response.msg);
}
function show_error_response(response){
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: response.msg
    });
   // alert(response.msg);
}
