@extends('admin.index')
@section('content')


<div class="card card-dark">
	<div class="card-header">
		<h3 class="card-title">
		<div class="">
			<span>{{!empty($title)?$title:''}}</span>
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
			<span class="caret"></span>
			<span class="sr-only"></span>
			</a>
			<div class="dropdown-menu" role="menu">
				<a href="{{aurl('abouts')}}" class="dropdown-item" style="color:#343a40">
				<i class="fas fa-list"></i> {{trans('admin.show_all')}} </a>
				<a href="{{aurl('abouts/'.$abouts->id)}}" class="dropdown-item" style="color:#343a40">
				<i class="fa fa-eye"></i> {{trans('admin.show')}} </a>
				<a class="dropdown-item" style="color:#343a40" href="{{aurl('abouts/create')}}">
					<i class="fa fa-plus"></i> {{trans('admin.create')}}
				</a>
				<div class="dropdown-divider"></div>
				<a data-toggle="modal" data-target="#deleteRecord{{$abouts->id}}" class="dropdown-item" style="color:#343a40" href="#">
					<i class="fa fa-trash"></i> {{trans('admin.delete')}}
				</a>
			</div>
		</div>
		</h3>
		@push('js')
		<div class="modal fade" id="deleteRecord{{$abouts->id}}">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">{{trans('admin.delete')}}</h4>
						<button class="close" data-dismiss="modal">x</button>
					</div>
					<div class="modal-body">
						<i class="fa fa-exclamation-triangle"></i>   {{trans('admin.ask_del')}} {{trans('admin.id')}}  ({{$abouts->id}})
					</div>
					<div class="modal-footer">
						{!! Form::open([
						'method' => 'DELETE',
						'route' => ['abouts.destroy', $abouts->id]
						]) !!}
						{!! Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger btn-flat']) !!}
						<a class="btn btn-default btn-flat" data-dismiss="modal">{{trans('admin.cancel')}}</a>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
		@endpush
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
		</div>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
										
{!! Form::open(['url'=>aurl('/abouts/'.$abouts->id),'method'=>'put','id'=>'abouts','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="row">

<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        {!! Form::label('title',trans('admin.title'),['class'=>'control-label']) !!}
        {!! Form::text('title', $abouts->title ,['class'=>'form-control','placeholder'=>trans('admin.title')]) !!}
    </div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        {!! Form::label('header',trans('admin.header'),['class'=>'control-label']) !!}
        {!! Form::text('header', $abouts->header ,['class'=>'form-control','placeholder'=>trans('admin.header')]) !!}
    </div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 photo">
    <div class="row">
        <div class="col-md-9">
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
        <div class="col-md-2" style="padding-top: 30px;">
            @include("admin.show_image",["image"=>$abouts->photo])
        </div>
    </div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        {!! Form::label('description',trans('admin.description'),['class'=>'control-label']) !!}
        {!! Form::textarea('description', $abouts->description ,['class'=>'form-control ckeditor','placeholder'=>trans('admin.description')]) !!}
    </div>
</div>

</div>
		<!-- /.row -->
		</div>
	<!-- /.card-body -->
	<div class="card-footer"><button type="submit" name="save" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> {{ trans('admin.save') }}</button>
<button type="submit" name="save_back" class="btn btn-success btn-flat"><i class="fa fa-save"></i> {{ trans('admin.save_back') }}</button>
{!! Form::close() !!}
</div>
</div>
@endsection