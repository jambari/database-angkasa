<div class="m-t-10 m-b-10 p-l-10 p-r-10 p-t-10 p-b-10">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-solid box-primary">
				<div class="box-header">
					<h3 class="box-title"> <i wi wi-earthquake></i> <span>Gempabumi {{ $gempas->tanggal }} {{ $gempas->waktu }}</span> </h3>
				</div>
				<div class="box-body">
					<div class="container">
						<div class="row">
							<div id="map" style="width:100%;height:400px;"></div>
							<script>
								function initMap() {
									var myLatlng = {lat:{{ $gempas->lintang }}, lng:{{ $gempas->bujur }}  };
									var map = new google.maps.Map(document.getElementById('map'), {
							center: myLatlng,
							zoom: 6,
							styles: [
							{elementType: 'geometry', stylers: [{color: '#242f3e'}]},
							{elementType: 'labels.text.stroke', stylers: [{color: '#242f3e'}]},
							{elementType: 'labels.text.fill', stylers: [{color: '#746855'}]},
							{
							featureType: 'administrative.locality',
							elementType: 'labels.text.fill',
							stylers: [{color: '#d59563'}]
							},
							{
							featureType: 'poi',
							elementType: 'labels.text.fill',
							stylers: [{color: '#d59563'}]
							},
							{
							featureType: 'poi.park',
							elementType: 'geometry',
							stylers: [{color: '#263c3f'}]
							},
							{
							featureType: 'poi.park',
							elementType: 'labels.text.fill',
							stylers: [{color: '#6b9a76'}]
							},
							{
							featureType: 'road',
							elementType: 'geometry',
							stylers: [{color: '#38414e'}]
							},
							{
							featureType: 'road',
							elementType: 'geometry.stroke',
							stylers: [{color: '#212a37'}]
							},
							{
							featureType: 'road',
							elementType: 'labels.text.fill',
							stylers: [{color: '#9ca5b3'}]
							},
							{
							featureType: 'road.highway',
							elementType: 'geometry',
							stylers: [{color: '#746855'}]
							},
							{
							featureType: 'road.highway',
							elementType: 'geometry.stroke',
							stylers: [{color: '#1f2835'}]
							},
							{
							featureType: 'road.highway',
							elementType: 'labels.text.fill',
							stylers: [{color: '#f3d19c'}]
							},
							{
							featureType: 'transit',
							elementType: 'geometry',
							stylers: [{color: '#2f3948'}]
							},
							{
							featureType: 'transit.station',
							elementType: 'labels.text.fill',
							stylers: [{color: '#d59563'}]
							},
							{
							featureType: 'water',
							elementType: 'geometry',
							stylers: [{color: '#17263c'}]
							},
							{
							featureType: 'water',
							elementType: 'labels.text.fill',
							stylers: [{color: '#515c6d'}]
							},
							{
							featureType: 'water',
							elementType: 'labels.text.stroke',
							stylers: [{color: '#17263c'}]
							}
							]
							});
							var image = 'http://office.dev/uploads/2016/tatausaha/pegawai/foto/mapiconscollection-natural-disaster-eb391a-default/earthquake-3.png';
							var marker = new google.maps.Marker({
							position: myLatlng,
							map: map,
							icon: image
							});
							var contentString = '<table class="table table-bordered table-striped">'+
										'<tbody>'+
													'<tr>'+
																'<td>'+'Magnitudo'+'</td>'+
																'<td>'+'<label class="label label-danger">'+'{{ $gempas->magnitudo }} SR'+'</label>'+'</td>'+
													'</tr>'+
													'<tr>'+
																'<td>'+'Tanggal'+'</td>'+
																'<td>'+'{{ $gempas->tanggal }} {{ $gempas->waktu }} UTC'+'</td>'+
													'</tr>'+
													'<tr>'+
																'<td>'+'Lokasi'+'</td>'+
																'<td>'+'{{ $gempas->lintang }}, {{ $gempas->bujur }} '+'</td>'+
													'</tr>'+
													'<tr>'+
																'<td>'+'Kedalaman'+'</td>'+
																'<td>'+'{{ $gempas->kedalaman }} Km '+'</td>'+
													'</tr>'+
													'<tr>'+
																'<td>'+'Lokasi'+'</td>'+
																'<td>'+'{{ $gempas->lokasi }} Km '+'</td>'+
													'</tr>'+
										'</tbody>'+
							'</table>';
							var infowindow = new google.maps.InfoWindow({
								content: contentString
							});
							marker.addListener('click', function() {
								infowindow.open(map, marker);
							});
								}
							</script>
							<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxboE6Q1qKhSDL8HO4wHyH50-CiDUygcA&callback=initMap">
							</script>
						</div>
						<div>
							<p align="center">Info Gempa Mag: {{ $lapenda->magnitudo }} SR, {{ $hari }}-@if ($month == '1')
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
							@endif-{{ $tahun }} {{ $lapenda->waktu }} WIT, Lok: {{ $lapenda->lintang }} - {{ $lapenda->bujur}} ({{ $lapenda->lokasi }}), Kedlmn: {{ $lapenda->kedalaman }} km :: BMKG-JAY.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<div class="clearfix"></div>