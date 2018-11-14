@extends('admin.master')

@section('title')
Product Details
@endsection

@section('content')

<!--content-->
<div class="content-wrapper">
    <div class="container-fluid well">
        @include('admin.includes.breadcrumb')

        <table class="table table-hover">
            <tr>
                <th>ID</th>
                <td>{{ $product->id }}</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>{{ $product->productName }}</td>
            </tr>
            <tr>
                <th>Category</th>
                <td>{{ $product->categoryName }}</td>
            </tr>
            <tr>
                <th>Manufacturer</th>
                <td>{{ $product->manufacturerName }}</td>
            </tr>
            <tr>
                <th>Price</th>
                <td>Tk. {{ $product->productPrice }}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>{{ $product->productDescription }}</td>
            </tr>
            <tr>
                <th>Product Image</th>
                <td><img style="width: 100px; height: 100px;" src="{{ asset($product->productImage) }}" alt="{{ $product->productName }}"></td>
            </tr>
            <tr>
                <th>Status</th>
                <td>{{ $product->publicationStatus == 0 ? 'Published' : 'Unpublished' }}</td> 
            </tr>           
        </table>

    </div>

    @endsection