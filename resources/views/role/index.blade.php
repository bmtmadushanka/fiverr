@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">
                    <a class="mb-2 mr-2 btn btn-info" style="float:right;" href="{{ route('role.create') }}">New Role
                        </a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <table class="mb-0 table" id="ErpTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($roles)                                    
                                @foreach ($roles as $data)
                                    <tr>
                                        <td>{{ $data->id }}</td>
                                        <td>{{ $data->role}}</td>
                                        <td>
                                            <form action="{{ route('role.delete', $data->id) }}" method="POST">
                                                <a href="{{ route('role.edit', $data->id) }}"
                                                    class="btn btn-primary">Edit</a>
                                                @csrf
                                                {{ method_field('POST') }}
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

@endsection
