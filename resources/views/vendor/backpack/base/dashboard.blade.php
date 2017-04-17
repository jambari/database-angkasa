@extends('backpack::layout')
@section('after_styles')
@endsection
@section('header')
<section class="content-header">
	<h1>
	Dashboard
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a></li>
		<li class="active">{{ trans('backpack::base.dashboard') }}</li>
	</ol>
</section>
@endsection
@section('content')
<div class="row">
	<div class="ol-xs-12 col-md-12 col-xl-12">
		<div class="box box-success">
			<div class="box-header with-border">
				<h3 class="box-title"> Data terkini</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i> </button> {{-- end btn-box-tool --}}
				</div> {{-- end box-tools --}}
			</div> {{-- end box-header --}}
			<div class="box-body">
				<div class="row">
					{{-- Gempa update --}}
					<div class="col-xs-12 col-md-3 col-xl-3">
						<div class="info-box">
							<span class="info-box-icon bg-red"><i class="wi wi-earthquake"></i></span>
							<div class="info-box-content">
								<span class="info-box-text">Gempabumi</span>
								<span class="info-box-text"> <span class="label label-danger">{{ $gempa->magnitudo }}</span> {{ $gempa->tanggal }} </span>
								<span class="info-box-text">{{ $gempa->waktu}} {{ $gempa->lintang }} {{ $gempa->bujur }} </span>
								<span class="">{{ $gempa->kedalaman }} km.</span>
							</div>
						</div>
					</div>{{-- end gempa --}}
					{{-- magnet update --}}
					<div class="col-xs-12 col-md-3 col-xl-3">
						<div class="info-box">
							<span class="info-box-icon bg-green"><i class="fa fa-magnet"></i></span>
							<div class="info-box-content">
								<span class="info-box-text">Magnetbumi</span>
								<span class="info-box-text">{{ $komponend->tanggal }}</span>
								<span class="info-box-text">deklinasi {{ $deklinasi }}&deg;</span>
							</div>
						</div>
					</div>{{-- end magnet --}}
					<div class="col-xs-12 col-md-3 col-xl-3">
						<div class="info-box">
							<span class="info-box-icon bg-blue"><i class="wi wi-lightning"></i></span>
							<div class="info-box-content">
								<span class="info-box-text">Petir</span>
								<span class="info-box-text">{{ $summary->tanggal }}</span>
								<span class="info-box-text">Stroke {{ $summary->stroke }}</span>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-md-3 col-xl-3">
						<div class="info-box">
							<span class="info-box-icon bg-yellow"><i class="wi wi-raindrops"></i></span>
							<div class="info-box-content">
								<span class="info-box-text">Curah hujan</span>
								<span class="info-box-text">{{ $hujan->tanggal }}</span>
								<span class="info-box-text">Obs {{ $hujan->obs }} <small>mm</small></span> 
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
{{-- KALENDER --}}
<div class="row">
	<div class="col-xs-12 col-md-12 ">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Aktifitas hari ini</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i> </button> {{-- end btn-box-tool --}}
				</div> {{-- end box-tools --}}
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-md-12">
						{!! $calendar->calendar() !!}
						{!! $calendar->script() !!}
						<h1 class="label label-success">Tips</h1>
						<ul>
							<li>Cek semua peralatan operasional :-)</li>
							<li>Jangan lupa analisa LEMI jam 00 UTC :-)</li>
							<li>Isi Menu ceklist peralatan</li>
							<li>Screensut sebagai bukti profuktifitas</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection