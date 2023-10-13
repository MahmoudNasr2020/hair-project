
 <div class="btn-group">
	<button type="button" class="btn btn-success btn-flat dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i> {{ trans('admin.actions') }}</button>
	<span class="caret"></span>
	<span class="sr-only"></span>
	</button>
	<div class="dropdown-menu" role="menu">
		<a href="{{ aurl('/abouts/'.$id.'/edit')}}" class="dropdown-item" ><i class="fas fa-edit"></i> {{trans('admin.edit')}}</a>
		<a href="{{ aurl('/abouts/'.$id)}}" class="dropdown-item" ><i class="fa fa-eye"></i> {{trans('admin.show')}}</a>

	</div>
</div>
