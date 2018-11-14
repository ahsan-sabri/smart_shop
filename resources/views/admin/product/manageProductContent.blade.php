@extends('admin.master')

@section('title')
Manage Product
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
                    <th>Name</th>                   
                    <th>Category</th>
                    <th>Manufacturer</th>
                    <th>Price</th>
                    <th>Description</th>
                    <!--<th>Product Image</th>-->
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach($products as $product)
            <tr>

                <td>{{ $product->id }}</td>
                <td>{{ $product->productName }}</td>          
                <td>{{ $product->categoryName }}</td>                                                               
                <td>{{ $product->manufacturerName }}</td> 
                <td>Tk. {{ $product->productPrice }}</td>
                <td>{{ $product->productDescription }}</td>                                                               
                <!--<td><img style="width: 100px; height: 100px;" src="{{ asset($product->productImage) }}" alt="image"></td>-->                                                               
                <td>{{ $product->publicationStatus == 0 ? 'Published' : 'Unpublished' }}</td>                                                               
                <td><a href="{{ url('/product/view/'.$product->id) }}" type="submit" title="Product view" class="btn btn-info btn-sm"><i class="fa fa-info-circle"></i></a>
                    <a href="{{ url('/product/edit/'.$product->id) }}" type="submit" title="Product Edit" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                    <a href="{{ url('/product/delete/'.$product->id) }}" type="submit" title="Product Delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                </td>
            </tr>    
            @endforeach
        </table>

    </div>

    @endsection