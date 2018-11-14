@extends('admin.master')

@section('title')
Manage Slides
@endsection

@section('content')

<!--content-->
<div class="content-wrapper">
    <div class="container-fluid well">
        @include('admin.includes.breadcrumb')

        <h3 class="text-center text-success">{{ Session::get('message') }}</h3>

        {!! Form::open(['url' => 'slider/upload', 'method' => 'POST', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}

        <div class="row form-group">
            <label for="uploadSlide" class="control-label col-sm-2">Upload New Slide</label>
            <div class="col-sm-10">
                <input name="slide" type="file" id="uploadSlide">
                <span class="text-danger">{{ $errors->has('slide') ? $errors->first('slide') : '' }}</span>
            </div>
        </div>      

        <div class="row form-group">
            <div class="col-sm-2"></div>
            <div class="col-sm-3">
                <button name="slide_submit" type="submit" class="btn btn-success btn-block">Upload Image</button>
            </div>
        </div>


        {!! Form::close() !!}

        <br><br><br>


        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Slide Id</th>
                    <th>Slide Images</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach($slides as $slide)

            <tr>
                <td>{{ $slide->id }}</td>                                                             
                <td><img src="{{ asset($slide->slide) }}" alt="current_Slide" style="height: 150px; width: 250px;"></td>                                                             
                <td><a href="{{ url('/slider/change/'.$slide->id) }}" class="btn btn-primary btn-sm" title="Change Slide"><i class="fa fa-pencil"></i></a>
                    <a href="{{ url('/slider/delete/'.$slide->id) }}" class="btn btn-primary btn-sm" title="Delete Slide"><i class="fa fa-trash"></i></a></td>
            </tr>  
            @endforeach

        </table>


    </div>

    @endsection

