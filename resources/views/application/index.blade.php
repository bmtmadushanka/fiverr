@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">
                    <a class="mb-2 mr-2 btn btn-info" style="float:right;" href="{{ route('application.create') }}">New Application
                        </a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <table class="mb-0 table" id="example">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>SR Number</th>
                                    <th>Letter Number</th>
                                    <th>Applicant Name</th>
                                    <th>Request Date</th>
                                    <th>Action</th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th><input type="text" /></th>
                                    <th><input type="text" /></th>
                                    <th><input type="text" /></th>
                                    <th><input type="text" /></th>
                                    <th></th>
                                </tr>
                            </thead>
                            
                            
                            <tbody>

                                @isset($applications)                                    
                                @foreach ($applications as $data)
                                    <tr>
                                        <td>{{ $data->id }}</td>
                                        <td>{{ $data->sr_number}}</td>
                                        <td>{{ $data->applicant_civil_id }}</td>
                                        <td>{{ $data->applicant_name }}</td>
                                        <td>{{ $data->action_date }}</td>
                                        <td>
                                            <form action="{{ route('application.delete', $data->id) }}" method="POST">
                                                <a href="{{ route('application.edit', $data->id) }}"
                                                    class="btn btn-primary">Edit</a>
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
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
});

</script>
@endsection
