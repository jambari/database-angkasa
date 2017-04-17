@if ($crud->hasAccess('peta'))
	<a href="{{ url($crud->route.'/'.$entry->getKey().'/peta') }}" class="btn btn-xs btn-default"><i class="fa fa-file-image-o"></i> Lihat</a>
@endif