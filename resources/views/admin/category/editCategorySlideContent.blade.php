@extends('admin.master')

@section('title')
Edit Category Slide
@endsection

@section('content')

<!--content-->
<div class="content-wrapper">
    <div class="container-fluid well">
        @include('admin.includes.breadcrumb')

        <h3 class="text-center text-success">{{ Session::get('message') }}</h3>

        {!! Form::open(['url' => 'category/slide/update', 'method' => 'POST', 'class' => 'form-horizontal', 'name' => 'editCategorySlideForm', 'enctype' => 'multipart/form-data']) !!}

        <div class="row form-group">
            <label for="categoryName" class="control-label col-sm-2">Category Name</label>
            <div class="col-sm-10">
                <select name="categoryId" class="form-control" id="categoryName">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->categoryName }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row form-group">
            <label for="categorySlide" class="control-label col-sm-2">Slide Image</label>
            <div class="col-sm-10">
                <input name="categorySlide" type="file" id="categorySlide" accept="image/*">
                <span class="text-danger">{{ $errors->has('categorySlide') ? $errors->first('categorySlide') : '' }}</span>
            </div>
        </div>

        <div>
            <input name="slideId" type="hidden" value="{{ $slide->id }}">
        </div>

        <div class="row form-group">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <button name="update" type="submit" class="btn btn-success btn-block">Update Category Slide</button>
            </div>
        </div>


        {!! Form::close() !!}


    </div>

    <script>
        document.forms['editCategorySlideForm'].elements['categoryId'].value = {{ $slide -> categoryId }}
    </script>

    @endsection