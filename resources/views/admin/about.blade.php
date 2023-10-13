@extends('admin.index')
@section('content')
@php
    $title='About';
@endphp
<div class="card card-dark">
    <div class="card-header">
        <h3 class="card-title">About</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        {!! Form::open(['url'=>aurl('/about/update/'.App\Models\About::orderBy('id','desc')->first()->id),'id'=>'settings','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
        <div class="row">

            <div class="form-group col-md-12">
                @php
                    $title1 ='';
                    if(!empty(App\Models\About::orderBy('id','desc')->first()->title))
                    {
                        $title1 =  App\Models\About::orderBy('id','desc')->first()->title;
                    }
                @endphp
                {!! Form::label('title','Title',['class'=>'control-label']) !!}
                {!! Form::text('title',$title1,['class'=>'form-control','placeholder'=>'Title']) !!}
            </div>

            <div class="form-group col-md-12">
                @php
                    $header ='';
                    if(!empty(App\Models\About::orderBy('id','desc')->first()->header))
                    {
                        $header =  App\Models\About::orderBy('id','desc')->first()->header;
                    }
                @endphp
                {!! Form::label('header','Header',['class'=>'control-label']) !!}
                {!! Form::text('header',$header,['class'=>'form-control','placeholder'=>'Header']) !!}
            </div>

            <div class="col-md-12">
                @php
                $photo ='';
                if(!empty(App\Models\About::orderBy('id','desc')->first()->photo))
                {
                    $photo =  App\Models\About::orderBy('id','desc')->first()->photo;
                }
                @endphp
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="exampleInputFile">{{ trans('admin.logo') }}</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    {!! Form::file('photo',['class'=>'custom-file-input','placeholder'=>"Photo"]) !!}
                                    {!! Form::label('photo','Photo',['class'=>'custom-file-label']) !!}
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="">{{ trans('admin.upload') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <br />
                        @include('admin.show_image',['image'=>$photo])
                    </div>
                </div>
            </div>

            <div class="form-group col-md-12">
                @php
                    $description ='';
                    if(!empty(App\Models\About::orderBy('id','desc')->first()->description))
                    {
                        $description =  App\Models\About::orderBy('id','desc')->first()->description;
                    }
                @endphp
                {!! Form::label('description','Description',['class'=>'control-label']) !!}
                {!! Form::textarea('description', $description,['class'=>'form-control','placeholder'=>'Description']) !!}
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        {!! Form::submit(trans('admin.save'),['class'=>'btn btn-success btn-flat']) !!}
        {!! Form::close() !!}
    </div>
</div>
@endsection