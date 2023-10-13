
 <div class="btn-group">
	<button type="button" class="btn btn-success btn-flat dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i> {{ trans('admin.actions') }}</button>
	<span class="caret"></span>
	<span class="sr-only"></span>
	</button>
	<div class="dropdown-menu" role="menu">
		<a href="{{ aurl('/about/'.$id.'/edit')}}" class="dropdown-item" ><i class="fas fa-edit"></i> {{trans('admin.edit')}}</a>
		<a href="{{ aurl('/about/'.$id)}}" class="dropdown-item" ><i class="fa fa-eye"></i> {{trans('admin.show')}}</a>
		<div class="dropdown-divider"></div>
		<a data-toggle="modal" data-target="#delete_record{{$id}}" href="#" class="dropdown-item">
		<i class="fas fa-trash"></i> {{trans('admin.delete')}}</a>
	</div>
</div>

		