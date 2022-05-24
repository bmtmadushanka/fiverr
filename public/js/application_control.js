"use strict";


function initFromDepartmentSelect() {
    let sector_id  = $('#from_sector').val();
    $('#from_department').select2({
        placeholder : 'From Departments',
        ajax: {
            url: '/sectors/'+ sector_id + '/departments',
            dataType: 'json',
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
function initToDepartmentSelect() {
    let to_sector_id  = $('#to_sector').val();
    $('#to_department').select2({
        placeholder : 'To Departments',
        ajax: {
            url: '/sectors/'+ to_sector_id + '/departments',
            dataType: 'json',
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

$('#from_sector').on('change',function () {
    $('#from_department').empty().trigger('change');
    initFromDepartmentSelect();
});
$('#to_sector').on('change',function () {
    $('#to_department').empty().trigger('change');
    initToDepartmentSelect();
})

