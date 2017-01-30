@extends('vendor.backpack.base.layout')
@section('header')
<section class="content-header">
	<h1>Import data gempabumi</h1>
	<ol class="breadcrumb">
		<li><a href="admin/dashboard"><i class="fa fa-dashboard"></i>Home</a></li>
		<li><a href="admin/gempabumi"><i class="wi wi-earthquake">Gempabumi</i></a></li>
		<li class="active"><i class="fa fa-cloud-upload">Import </i></li>
	</ol>
</section>
@endsection
@section('content')
	<div class="box box-solid box-success">
		<div class="box-header">
			<h3><i class="fa fa-cloud-upload"></i> Import data gempabumi</h3>
		</div>
		<div class="box-body">
		{!! Form::open(['url' => route('import.gempabumi'),
      		'method' => 'post', 'files'=>'true', 'class'=>'form-horizontal']) !!}
      		@include('gempabumi._import')
      	{!! Form::close() !!}
		</div>
	</div>
@endsection