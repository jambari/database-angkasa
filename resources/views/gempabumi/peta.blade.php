<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Info Gempabumi</title>
		<style>
			table, td {
				border-collapse: collapse; 
				border: 1px solid gray;
			}
		</style>
	</head>
	<body>
		<div>
			<div>
				<div>
					<div>
						<img src="{{ asset('images') }}/lapenda.png" alt="lokasi_gempa" width="450" height="370">
					</div>
					<div>
						<table width="450">
							<tbody>
								<tr>
									<td style="padding-top: 10px;">
										<img align="center" border="0" src="{{ asset('images') }}/logo_bmg.gif" width="65" height="65">
										<p align="center"><strong>BMKG</strong> </p>
									</td>
									<td>
										<p style="padding-left: 20px;">Info Gempa Mag: {{ $lapenda->magnitudo }} SR, {{ $hari }}-@if ($month == '1')
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
									</td>
								</tr>
								<tr>
									<td colspan="2">
										<address>
											Jl. Drs. Krisna Sunarya No. 26 Angkasapura - Jayapura, 0967 533533, 9613
										</address>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>