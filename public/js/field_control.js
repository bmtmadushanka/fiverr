"use strict";

$(document).ready(function () {
    initEducationSelect();
});

$('#edu_upload_file').on('change',function () {
    $('#edu_upload_span').text('File Selected');
    $('#edu_upload_btn').attr('disabled',false);

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
        minimumResultsForSearch: -1
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
  //add confirm action swal
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
$('#edu_upload_btn').on('click',function () {
    if($('#edu_upload_file')[0].files.length == 0){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Please select file to upload'
        });
    }else{
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
    }

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
