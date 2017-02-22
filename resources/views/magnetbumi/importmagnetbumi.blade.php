@extends('vendor.backpack.base.layout')
@section('header')
<section class="content-header">
	<h1>Import data magnetbumi</h1>
	<ol class="breadcrumb">
		<li><a href="admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="admin/gempabumi"><i class="fa fa-magnet"> Magnetbumi</i></a></li>
		<li class="active"><i class="fa fa-cloud-upload"> Import </i></li>
	</ol>
</section>
@endsection
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-solid box-success">
				<div class="box-header">
					<h3><i class="fa fa-cloud-upload"></i> Import data magnetbumi</h3>
				</div>
				<div class="box-body">
					@if (count($errors) > 0)
    					<div class="alert alert-danger">
        					<ul>
            					@foreach ($errors->all() as $error)
                					<li>{{ $error }}</li>
            					@endforeach
        					</ul>
    					</div>
					@endif

					{!! Form::open(['url' => route('import.magnetbumi'),
					'method' => 'post', 'files'=>'true', 'class'=>'form-horizontal']) !!}
					@include('magnetbumi._import')
					{!! Form::close() !!}
				</div>
			</div>
		</div>
</div>
@endsection