@extends('admin.master')

@section('title')
Edit Manufacturer
@endsection

@section('content')

<!--content-->
<div class="content-wrapper">
    <div class="container-fluid well">
        @include('admin.includes.breadcrumb')

        <h3 class="text-center text-success">{{ Session::get('message') }}</h3>

        {!! Form::open(['url' => 'manufacturer/update', 'method' => 'POST', 'class' => 'form-horizontal', 'name' => 'editManufacturerForm']) !!}

        <div class="row form-group">
            <label for="manufacturer_name" class="control-label col-sm-2">Manufacturer Name</label>
            <div class="col-sm-10">
                <input name="manufacturerName" type="text" class="form-control" id="manufacturer_name" placeholder="Manufacturer Name" value="{{ $manufacturerInfo->manufacturerName }}">
                <input type="hidden" value="{{ $manufacturerInfo->id }}" name="manufacturerId">
            </div>
        </div>

        <div class="row form-group">
            <label for="manufacturer_description" class="control-label col-sm-2">Manufacturer Description</label>
            <div class="col-sm-10">
                <textarea name="manufacturerDescription" class="form-control" id="manufacturer_description" placeholder="Manufacturer Description" >{{ $manufacturerInfo->manufacturerDescription }}</textarea>
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
                <button name="update" type="submit" class="btn btn-success btn-block">Update Manufacturer Info</button>
            </div>
        </div>


        {!! Form::close() !!}


    </div>
    
    <script>
         document.forms['editManufacturerForm'].elements['publicationStatus'].value = {{ $manufacturerInfo->publicationStatus }}
    </script>

    @endsection

