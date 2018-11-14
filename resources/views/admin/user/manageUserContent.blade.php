@extends('admin.master')

@section('title')
Manage User
@endsection

@section('content')

<!--content-->
<div class="content-wrapper">
    <div class="container-fluid well">
        @include('admin.includes.breadcrumb')

        <h5>Showing {{ $users->count() }} users of {{ $users->total() }} users.</h5>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>User Address</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach($users as $user)
            <tr>

                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->email }}</td>
                <td><a href="" type="submit" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                    <a href="" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td>

            </tr>    
            @endforeach
        </table><hr>
        <div>
            {{ $users->links() }}
        </div>


    </div>

    @endsection