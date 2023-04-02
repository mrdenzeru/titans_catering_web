@extends('layouts.master')

@section('content')

    <div class="container role-con">

        <div class="row role-changer">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h4>USERS VIEW</h4></div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->role_as == '1' ? 'Admin':'User' }}</td>
                                    <td>
                                        <a href="{{ url('admin/users/'.$item->id) }}" class="btn btn-success">EDIT</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection