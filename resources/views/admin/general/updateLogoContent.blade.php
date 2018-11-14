@extends('admin.master')

@section('title')
Update Logo
@endsection

@section('content')

<!--content-->
<div class="content-wrapper">
    <div class="container-fluid well">
        @include('admin.includes.breadcrumb')

                <h3 class="text-center text-success">{{ Session::get('message') }}</h3>
        
                {!! Form::open(['url' => 'logo/update', 'method' => 'POST', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
        
                <div class="row form-group">
                    <label for="uploadLogo" class="control-label col-sm-2">Upload New Logo</label>
                    <div class="col-sm-10">
                        <input name="logo" type="file" id="uploadLogo">
                        <input name="id" type="hidden" value="{{ $logo->id }}">
                        <span class="text-danger">{{ $errors->has('logo') ? $errors->first('logo') : '' }}</span>
                    </div>
                </div>      
        
                <div class="row form-group">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-3">
                        <button name="logo_submit" type="submit" class="btn btn-success btn-block">Update</button>
                    </div>
                </div>
        
        
                {!! Form::close() !!}      

    </div>

    @endsection
