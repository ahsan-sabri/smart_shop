@extends('admin.master')

@section('title')
Add Category
@endsection

@section('content')

<!--content-->
<div class="content-wrapper">
    <div class="container-fluid well">
        @include('admin.includes.breadcrumb')

        <h3 class="text-center text-success">{{ Session::get('message') }}</h3>

        {!! Form::open(['url' => 'category/save', 'method' => 'POST', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}

        <div class="row form-group">
            <label for="category_name" class="control-label col-sm-2">Category Name</label>
            <div class="col-sm-10">
                <input name="categoryName" type="text" class="form-control" id="category_name" placeholder="Category Name">
                <span class="text-danger">{{ $errors->has('categoryName') ? $errors->first('categoryName') : '' }}</span>
            </div>
        </div>

        <div class="row form-group">
            <label for="category_description" class="control-label col-sm-2">Category Description</label>
            <div class="col-sm-10">
                <textarea name="categoryDescription" class="form-control" id="category_description" placeholder="Category Description"></textarea>
                <span class="text-danger">{{ $errors->has('categoryDescription') ? $errors->first('categoryDescription') : '' }}</span>
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
                <button name="category_submit" type="submit" class="btn btn-success btn-block">Add Category</button>
            </div>
        </div>


        {!! Form::close() !!}<br><br><br>

        <!--Add category slide-->
        
        <h3 class="text-center text-success">{{ Session::get('slideUploadMessage') }}</h3>

        {!! Form::open(['url' => 'category/slide/add', 'method' => 'POST', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
        
        <div class="row form-group">
            <label for="category_name" class="control-label col-sm-2">Category Name</label>
            <div class="col-sm-10">
                <select name="categoryId" class="form-control" id="category_name">
                    <option><--Select Category--></option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->categoryName }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row form-group">
            <label for="uploadSlide" class="control-label col-sm-2">Add Category Slide</label>
            <div class="col-sm-10">
                <input name="categorySlide" type="file" id="uploadSlide" accept="image/*">
                <span class="text-danger">{{ $errors->has('categorySlide') ? $errors->first('categorySlide') : '' }}</span>
            </div>
        </div>      

        <div class="row form-group">
            <div class="col-sm-2"></div>
            <div class="col-sm-3">
                <button name="slide_submit" type="submit" class="btn btn-success btn-block">Upload Slide</button>
            </div>
        </div>


        {!! Form::close() !!}


    </div>

    @endsection