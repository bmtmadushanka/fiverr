@extends('layouts.app')
@section('content')
@inject('permission', 'App\Classes\permission')
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header">
            @if ($permission->permitted('users-add')=='success')
                    <a href="{{ route('user.create') }}" class="btn btn-primary" style="float:right;">
                        <i class="fas fa-plus"></i>
                        New User
                    </a>
                @endif
            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                <table class="table table-bordered table-hover table-checkable" id="users-table">
                    <thead>
                        <tr>
                            <th style="width:7%">ID</th>
                            <th style="width:22%">User</th>
                            <th style="width:27%">Contact</th>
                            <th style="width:10%">Role</th>
                            <th style="width:10%">Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @isset($users)                                    
                        @foreach ($users as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->name}}</td>
                                <td>{{ $data->email}}</td>
                                <td>{{ $data->role }}</td>
                                <td>@if($data->status==1)Active @else Deactive @endif</td>
                                <td>
                                    <form action="{{ route('user.delete', $data->id) }}" method="POST">
                                        <a href="{{ route('user.edit', $data->id) }}"
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
                <!--end: Datatable-->
            </div>
        </div>
    </div>
</div>
@endsection
