@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">
                        </a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <table class="mb-0 table" id="example">
                            <thead>
                                <tr>
                                    <th>Column</th>
                                    <th>Old Value</th>
                                    <th>New value</th>
                                    <th>Edited By</th>
                                    <th>Edited At</th>
                                </tr>
                                <tr>
                                    <th><input type="text" /></th>
                                    <th><input type="text" /></th>
                                    <th><input type="text" /></th>
                                    <th><input type="text" /></th>
                                    <th><input type="text" /></th>
                                    <th></th>
                                </tr>
                            </thead>


                            <tbody>

                                @isset($history)
                                @foreach ($history as $data)
                                    <tr>
                                        <td>{{ $data->column}}</td>
                                        <td>{{ $data->old }}</td>
                                        <td>{{ $data->new }}</td>
                                        <td>{{ $data->edited_by }}</td>
                                        <td>{{ $data->created_at }}</td>
                                    </tr>
                                @endforeach
                                @endisset
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('scripts')
<script>
$(document).ready(function () {

    // DataTable
    var table = $('#example').DataTable({
        initComplete: function () {
            // Apply the search
            this.api()
                .columns()
                .every(function () {
                    var that = this;

                    $('input', this.header()).on('keyup change clear', function () {
                        if (that.search() !== this.value) {
                            that.search(this.value).draw();
                        }
                    });
                });
        },
    });

    $('.app_delete').on('click',function () {
        let t = table;
        let id  = $(this).data('id');
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
                    url : '/application/'+id,
                    success : function (res) {
                        t.ajax.reload();
                        show_success_response(res);
                    },
                    error : function (res) {
                        show_error_response(res);
                    }
                });
            }
        })
    })
});

</script>
@endsection
