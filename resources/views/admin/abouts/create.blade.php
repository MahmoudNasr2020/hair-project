@extends('admin.index')
@section('content')


<div class="card card-dark">
	<div class="card-header">
		<h3 class="card-title">
		<div class="">
			<span>
			{{ !empty($title)?$title:'' }}
			</span>
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
			<span class="caret"></span>
			<span class="sr-only"></span>
			</a>
			<div class="dropdown-menu" role="menu">
				<a href="{{ aurl('abouts') }}"  style="color:#343a40"  class="dropdown-item">
				<i class="fas fa-list"></i> {{ trans('admin.show_all') }}</a>
			</div>
		</div>
		</h3>
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
		</div>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
								
{!! Form::open(['url'=>aurl('/abouts'),'id'=>'abouts','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="row">

<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        {!! Form::label('title',trans('admin.title'),['class'=>' control-label']) !!}
            {!! Form::text('title',old('title'),['class'=>'form-control','placeholder'=>trans('admin.title')]) !!}
    </div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        {!! Form::label('header',trans('admin.header'),['class'=>' control-label']) !!}
            {!! Form::text('header',old('header'),['class'=>'form-control','placeholder'=>trans('admin.header')]) !!}
    </div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 photo">
    <div class="form-group">
        <label for="'photo'">{{ trans('admin.photo') }}</label>
        <div class="input-group">
            <div class="custom-file">
                {!! Form::file('photo',['class'=>'custom-file-input','placeholder'=>trans('admin.photo'),"accept"=>it()->acceptedMimeTypes("image"),"id"=>"photo"]) !!}
                {!! Form::label('photo',trans('admin.photo'),['class'=>'custom-file-label']) !!}
            </div>
            <div class="input-group-append">
                <span class="input-group-text" id="">{{ trans('admin.upload') }}</span>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        {!! Form::label('description',trans('admin.description'),['class'=>'control-label']) !!}
            {!! Form::textarea('description',old('description'),['class'=>'form-control ckeditor','placeholder'=>trans('admin.description')]) !!}
    </div>
</div>

</div>
		<!-- /.row -->
	</div>
	<!-- /.card-body -->
	<div class="card-footer"><button type="submit" name="add" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> {{ trans('admin.add') }}</button>
<button type="submit" name="add_back" class="btn btn-success btn-flat"><i class="fa fa-plus"></i> {{ trans('admin.add_back') }}</button>
{!! Form::close() !!}	</div>
</div>
@endsection