@extends('admin.master')

@section('title')
Add Manufacturer
@endsection

@section('content')

<!--content-->
<div class="content-wrapper">
    <div class="container-fluid well">
        @include('admin.includes.breadcrumb')

        <h3 class="text-center text-success">{{ Session::get('message') }}</h3>

        {!! Form::open(['url' => 'manufacturer/save', 'method' => 'POST', 'class' => 'form-horizontal']) !!}

        <div class="row form-group">
            <label for="manufacturer_name" class="control-label col-sm-2">Manufacturer Name</label>
            <div class="col-sm-10">
                <input name="manufacturerName" type="text" class="form-control" id="manufacturer_name" placeholder="manufacturer Name">
                <span class="text-danger">{{ $errors->has('manufacturerName') ? $errors->first('manufacturerName') : '' }}</span>
            </div>
        </div>

        <div class="row form-group">
            <label for="manufacturer_description" class="control-label col-sm-2">Manufacturer Description</label>
            <div class="col-sm-10">
                <textarea name="manufacturerDescription" class="form-control" id="manufacturer_description" placeholder="manufacturer Description"></textarea>
                <span class="text-danger">{{ $errors->has('manufacturerDescription') ? $errors->first('manufacturerDescription') : '' }}</span>
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
                <button name="manufacturer_submit" type="submit" class="btn btn-success btn-block">Add Manufacturer</button>
            </div>
        </div>


        {!! Form::close() !!}


    </div>

    @endsection