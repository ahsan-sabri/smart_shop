@extends('admin.master')

@section('title')
Manage Category
@endsection

@section('content')

<!--content-->
<div class="content-wrapper">
    <div class="container-fluid well">
        @include('admin.includes.breadcrumb')

        <h3 class="text-center text-success">{{ Session::get('updateSuccess') }}</h3>
        <h3 class="text-center text-success">{{ Session::get('deleteSuccess') }}</h3>
        <h3 class="text-center text-success">{{ Session::get('slideUpdateMessage') }}</h3>
        
        <h2>Category Info Table</h2>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Category Description</th>
                    <th>Category Image</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            @foreach($categories as $category)
            <tr>

                <td>{{ $category->id }}</td>
                <td>{{ $category->categoryName }}</td>
                <td>{{ $category->categoryDescription }}</td>                                                               
                <td><img style="height: 120px; width: 90px;" src="{{ asset($category->categoryImage) }}" alt="category image"></td>                                                               
                <td>{{ $category->publicationStatus == 0 ? 'Published' : 'Unpublished' }}</td>                                                               
                <td><a href="{{ url('/category/edit/'.$category->id) }}" type="submit" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a></td>
                <td><a href="{{ url('/category/delete/'.$category->id) }}" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td>

            </tr>    
            @endforeach
        </table><br><br>
        
        <h2>Category Slide Table</h2>
        
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Slide Image</th>
                    <th>Category Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            @foreach($categorySlides as $slide)
            <tr>
                <td>{{ $slide->id }}</td>
                <td><img style="height: 120px; width: 200px;" src="{{ asset($slide->categorySlide) }}" alt="category image"></td>   
                <td>{{ $slide->categoryName }}</td>
                <td><a href="{{ url('/category/slide/edit/'.$slide->id) }}" type="submit" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a></td>
                <td><a href="{{ url('/category/slide/delete/'.$slide->id) }}" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td>

            </tr>    
            @endforeach
        </table>

    </div>

    @endsection