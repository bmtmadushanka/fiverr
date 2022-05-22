"use strict";

$(document).ready(function () {
    initEducationSelect();
});

$('.upload').on('change',function () {
    $(this).parent().find('span').text('File Selected');
   // $(this).closest('span').text('File Selected');
    $('#'+$(this).data('btn_name')).attr('disabled',false);

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
            $('#edu_name').val('');
        },
        error : function (res) {
            show_error_response(res);
        }
    });
})


$('#edu_delete_btn').on('click',function () {
    var id = $('#edu_select').val();
    if (!id){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text:  'Please select an Education'
        });
        return false;
    }
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
$('.upload_btn').on('click',function () {
    var action = $(this).data('action');
    var input_name = $(this).data('input_name');
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
        text:  JSON.parse(response.responseText).msg
    });
}
