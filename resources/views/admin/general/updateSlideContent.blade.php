@extends('admin.master')

@section('title')
Update Slide
@endsection

@section('content')

<!--content-->
<div class="content-wrapper">
    <div class="container-fluid well">
        @include('admin.includes.breadcrumb')

<!--                <h3 class="text-center text-success">{{ Session::get('success_message') }}</h3>-->
        
                {!! Form::open(['url' => 'slider/update', 'method' => 'POST', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
        
                <div class="row form-group">
                    <label for="updateSlide" class="control-label col-sm-2">Upload New Slide</label>
                    <div class="col-sm-10">
                        <input name="slide" type="file" id="updateSlide">
                        <input name="id" type="hidden" value="{{ $slide->id }}">
                        <span class="text-danger">{{ $errors->has('slide') ? $errors->first('slide') : '' }}</span>
                    </div>
                </div>      
        
                <div class="row form-group">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-3">
                        <button name="slide_submit" type="submit" class="btn btn-success btn-block">Update</button>
                    </div>
                </div>
        
        
                {!! Form::close() !!}      

    </div>

    @endsection
