@extends('admin.master')

@section('title')
Edit Category
@endsection

@section('content')

<!--content-->
<div class="content-wrapper">
    <div class="container-fluid well">
        @include('admin.includes.breadcrumb')

        <h3 class="text-center text-success">{{ Session::get('message') }}</h3>

        {!! Form::open(['url' => 'category/update', 'method' => 'POST', 'class' => 'form-horizontal', 'name' => 'editCategoryForm', 'enctype' => 'multipart/form-data']) !!}

        <div class="row form-group">
            <label for="category_name" class="control-label col-sm-2">Category Name</label>
            <div class="col-sm-10">
                <input name="categoryName" type="text" class="form-control" id="category_name" placeholder="Category Name" value="{{ $categoryInfo->categoryName }}">
                <input type="hidden" value="{{ $categoryInfo->id }}" name="categoryId">
            </div>
        </div>

        <div class="row form-group">
            <label for="category_description" class="control-label col-sm-2">Category Description</label>
            <div class="col-sm-10">
                <textarea name="categoryDescription" class="form-control" id="category_description" placeholder="Category Description" >{{ $categoryInfo->categoryDescription }}</textarea>
            </div>
        </div>
        
        <div class="row form-group">
            <label for="category_image" class="control-label col-sm-2">Category Image</label>
            <div class="col-sm-10">
                <input name="categoryImage" type="file" id="category_image" accept="image/*">
                <span class="text-danger">{{ $errors->has('categoryImage') ? $errors->first('categoryImage') : '' }}</span>
            </div>
        </div>

        <div class="row form-group">
            <label for="publicaton_status" class="control-label col-sm-2">Publication Status</label>
            <div class="col-sm-10">
                <select name="publicationStatus" class="form-control" id="publicaton_status">
                    <option><--Select--></option>
                    <option value="0">Published</option>
                    <option value="1">Unpublished</option>
                </select>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <button name="update" type="submit" class="btn btn-success btn-block">Update Category Info</button>
            </div>
        </div>


        {!! Form::close() !!}


    </div>
    
    <script>
         document.forms['editCategoryForm'].elements['publicationStatus'].value = {{ $categoryInfo->publicationStatus }}
    </script>

    @endsection

