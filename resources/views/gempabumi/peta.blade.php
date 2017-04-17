<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title></title>
        <link rel="stylesheet" href="{{ asset('materialize/css/') }}/materialize.min.css">
        <link href='//fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
        <link rel="stylesheet" href="{{ asset('vendor/adminlte/') }}/dist/css/weather-icons.min.css">
	</head>
	<body>
      <div class="row" align="center">
        <div class="col s12 m4">
          <div class="card">
            <div class="card-image">
              <img src="http://office.dev/images/lapenda.png" alt="lokasi_gempa">
            </div>
            <div class="card-content">
              <p>Info Gempa Mag: {{ $lapenda->magnitudo }} SR, {{ $hari }}-						@if ($month == '1')
						Jan
						@elseif ($month == '2')
						Feb
						@elseif ($month == '3')
						Mar
						@elseif ($month == '4')
						Apr
						@elseif ($month == '5')
						Mei
						@elseif ($month == '6')
						Jun
						@elseif ($month == '7')
						Jul
						@elseif ($month == '8')
						Agu
						@elseif ($month == '9')
						Sep
						@elseif ($month == '10')
						Okt
						@elseif ($month == '11')
						Nov
						@else
						Des
						@endif-{{ $tahun }} {{ $lapenda->waktu }} WIT, Lok: {{ $lapenda->lintang }} - {{ $lapenda->bujur}} ({{ $lapenda->lokasi }}), Kedlmn: {{ $lapenda->kedalaman }} km :: BMKG-JAY</p>
            </div>
            <div class="card-action">
              <img border="0" src="{{ asset('images') }}/logo_bmg.gif" width="92" height="92">
              <p><strong>BMKG</strong>
				<hr><strong>Stasiun Geofisika Angkasapura - Jayapura</strong>
              </p>
            </div>
          </div>
        </div>
      </div>
	</body>
    <script src="{{ asset('vendor/adminlte') }}/plugins/jQuery/jQuery-2.2.3.min.js"></script>
    <script src="{{ asset('materialize/js') }}/materialize.min.js"></script>
</html>