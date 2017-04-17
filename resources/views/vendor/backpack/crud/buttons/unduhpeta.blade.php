@if ($crud->hasAccess('peta'))
	<a href="{{ url($crud->route.'/'.$entry->getKey().'/unduhpeta') }}" class="btn btn-xs btn-default"><i class="fa fa-file-image-o"></i> Peta</a>
@endif