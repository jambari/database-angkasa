@extends('vendor.backpack.base.layout')
@section('header')
<section class="content-header">
	<h1>LAPENDA</h1>
	<ol class="breadcrumb">
		<li><a href="admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="admin/gempabumi"><i class="wi wi-earthquake"> Gempabumi</i></a></li>
		<li class="active"><i class="fa fa-cloud-upload"> Lapenda </i></li>
	</ol>
</section>
@endsection
@section('content')
<div class="row">
	<div class="col-xs-12 col-md-12 col-xl-12">
		<div class="box box-success">
			<div class="box-header with-border">
				<h3 class="box-title"> Lapenda</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i> </button> {{-- end btn-box-tool --}}
				</div> {{-- end box-tools --}}
			</div> {{-- end box-header --}}
			<div class="box-body">
				<div class="row">
					<div class="col-md-12">
						<table class="table table-striped table-responsive" id="lapendas-table">
							<thead>
								<tr>
									<th>Nomor</th>
									<th>Tanggal</th>
									<th>Origin</th>
									<th>Lintang</th>
									<th>Bujur</th>
									<th>Kedalaman</th>
									<th>Lokasi</th>
									<th>Tsunami</th>
									<th></th>
									<th></th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('after_scripts')
    <script>
    	//var template = Handlebars.compile($("#details-template").html());
        var table =	$('#lapendas-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ url('admin/pengamatan/lapenda/data') }}',
        columns: [
            // or just disable search since it's not really searchable. just add searchable:false
            {data: 'rownum', name: 'rownum', searchable: 'true'},
            {data: 'tanggal', name: 'tanggal', searchable: 'true'},
            {data: 'waktu', name: 'waktu', searchable: 'true'},
            {data: 'lintang', name: 'lintang', searchable: 'true'},
            {data: 'bujur', name: 'bujur', searchable: 'true'},
            {data: 'kedalaman', name: 'kedalaman', searchable: 'true'},
            {data: 'lokasi', name: 'lokasi', searchable: 'true'},
            {data: 'tsunami', name: 'tsunami', searchable: 'true'},
            {data: 'lihat', name: 'lihat', orderable: false, searchable: false},
            {data: 'pdf', name: 'pdf', orderable: false, searchable: false}
        ],
        order: [[0, 'desc'], [1, 'desc'], [2, 'desc']]
    });

    /* Add event listener for opening and closing details
    $('#lapendas-table tbody').on('click', 'td.details-control-lapenda', function(){
        var tr = $(this).closest('tr');
        var row = table.row( tr );

        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( template(row.data()) ).show();
            tr.addClass('shown');
        }
    }); 
    */
    </script>
@endsection
