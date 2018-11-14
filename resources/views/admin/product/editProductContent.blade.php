@extends('admin.master')

@section('title')
Edit Product
@endsection

@section('content')

<!--content-->
<div class="content-wrapper">
    <div class="container-fluid well">
        @include('admin.includes.breadcrumb')

        <h3 class="text-center text-success">{{ Session::get('message') }}</h3>

        {!! Form::open(['url' => 'product/update', 'method' => 'POST', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data', 'name' => 'editProductForm']) !!}

        <div class="row form-group">
            <label for="product_name" class="control-label col-sm-2">Product Name</label>
            <div class="col-sm-10">
                <input name="productName" type="text" class="form-control" id="product_name" value="{{ $productInfo->productName }}" placeholder="Product Name">
                <input type="hidden" value="{{ $productInfo->id }}" name="productId">
                <span class="text-danger">{{ $errors->has('productName') ? $errors->first('productName') : '' }}</span>
            </div>
        </div>

        <div class="row form-group">
            <label for="category_name" class="control-label col-sm-2">Category Name</label>
            <div class="col-sm-10">
                <select name="categoryId" class="form-control" id="category_name">            
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->categoryName }}</option>
                    @endforeach               
                </select>
            </div>
        </div>      

        <div class="row form-group">
            <label for="manufacturer_name" class="control-label col-sm-2">Manufacturer Name</label>
            <div class="col-sm-10">
                <select name="manufacturerId" class="form-control" id="manufacturer_name">
                    @foreach($manufacturers as $manufacturer)
                    <option value="{{ $manufacturer->id }}">{{ $manufacturer->manufacturerName }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row form-group">
            <label for="product_price" class="control-label col-sm-2">Product Price</label>
            <div class="col-sm-10">
                <input name="productPrice" type="number" class="form-control" id="product_price" value="{{ $productInfo->productPrice }}">
                <span class="text-danger">{{ $errors->has('productPrice') ? $errors->first('productPrice') : '' }}</span>
            </div>
        </div>

        <div class="row form-group">
            <label for="product_quantity" class="control-label col-sm-2">Product Quantity</label>
            <div class="col-sm-10">
                <input name="productQuantity" type="number" class="form-control" id="product_quantity" value="{{ $productInfo->productQuantity }}">
                <span class="text-danger">{{ $errors->has('productQuantity') ? $errors->first('productQuantity') : '' }}</span>
            </div>
        </div>

        <div class="row form-group">
            <label for="product_description" class="control-label col-sm-2">Product Description</label>
            <div class="col-sm-10">
                <textarea name="productDescription" class="form-control" id="product_description">{{ $productInfo->productDescription }}</textarea>
                <span class="text-danger">{{ $errors->has('productDescription') ? $errors->first('productDescription') : '' }}</span>
            </div>
        </div>

        <div class="row form-group">
            <label for="product_image" class="control-label col-sm-2">Product Image</label>
            <div class="col-sm-10">
                <input name="productImage" type="file" id="product_image" accept="image/*"><br><br>
                <img src="{{ asset($productInfo->productImage) }}" alt="image" style="width: 120px; height: 120px;">
                <span class="text-danger">{{ $errors->has('productImage') ? $errors->first('productImage') : '' }}</span>
            </div>
        </div>

        <div class="row form-group">
            <label for="publicaton_status" class="control-label col-sm-2">Publication Status</label>
            <div class="col-sm-10">
                <select name="publicationStatus" class="form-control" id="publicaton_status">                   
                    <option value="0">Published</option>
                    <option value="1">Unpublished</option>
                </select>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <button name="product_submit" type="submit" class="btn btn-success btn-block">Update Product Info</button>
            </div>
        </div>


        {!! Form::close() !!}

        <script>
            document.forms['editProductForm'].elements['publicationStatus'].value = {{ $productInfo -> publicationStatus }}
        
            document.forms['editProductForm'].elements['categoryId'].value = {{ $productInfo -> categoryId }}
       
            document.forms['editProductForm'].elements['manufacturerId'].value = {{ $productInfo -> manufacturerId }}
        </script>

    </div>

    @endsection