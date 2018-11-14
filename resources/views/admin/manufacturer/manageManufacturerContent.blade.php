@extends('admin.master')

@section('title')
Manage Manufacturer
@endsection

@section('content')

<!--content-->
<div class="content-wrapper">
    <div class="container-fluid well">
        @include('admin.includes.breadcrumb')

        <h3 class="text-center text-success">{{ Session::get('updateSuccess') }}</h3>
        <h3 class="text-center text-success">{{ Session::get('deleteSuccess') }}</h3>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Manufacturer Name</th>
                    <th>Manufacturer Description</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            @foreach($manufacturers as $manufacturer)
            <tr>

                <td>{{ $manufacturer->id }}</td>
                <td>{{ $manufacturer->manufacturerName }}</td>
                <td>{{ $manufacturer->manufacturerDescription }}</td>                                                               
                <td>{{ $manufacturer->publicationStatus == 0 ? 'Published' : 'Unpublished' }}</td>                                                               
                <td><a href="{{ url('/manufacturer/edit/'.$manufacturer->id) }}" type="submit" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a></td>
                <td><a href="{{ url('/manufacturer/delete/'.$manufacturer->id) }}" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td>

            </tr>    
            @endforeach
        </table>

    </div>

    @endsection