<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title></title>
		<link rel="stylesheet" href="">
	</head>
	<body>
		<B><FONT face="Times New Roman" size=2>
		<div align="center">
			<table border="0" cellpadding="0" cellspacing="0" width="600" height="83">
				<tr>
					<td width="52" rowspan="6" align="center" height="67">
					<img border="0" src="{{ asset('images') }}/logo_bmg.gif" width="92" height="92"></td>
					<td width="544" align="center" height="8"><b>BADAN METEOROLOGI KLIMATOLOGI DAN GEOFISIKA</b></td>
				</tr>
				<tr>
					<td width="544" align="center" height="8"><b>STASIUN GEOFISIKA ANGKASAPURA - JAYAPURA</b></td>
				</tr>
				<tr>
					<td width="544" align="center" height="4"><b> </b></td>
				</tr>
				<tr>
					<td width="544" align="center" height="21"><font size="2" face="Times New Roman">Jl. Drs. Krisna Sunarya No.26 Angkasapura</td>
				</tr>
				<tr">
					<td width="544" align="center" height="21"><font size="2" face="Times New Roman">Tel. (0967) 533533, Email. stageof.angkasa@bmkg.go.id 99613</td>
				</tr>
			</table>
		</div>
		<p></p>
		</font><FONT face="Times New Roman" size=2>
		<div align="center">
			<table border="0" cellpadding="0" cellspacing="0" width="600">
				<tr>
					<td align="center">
						<B><FONT face="Times New Roman" size=2>
					<img src="{{ asset('images') }}/g2.gif" width="602" height="6" border="0"></font></b></td>
				</tr>
				<tr>
					<td align="center"><b><u>BERITA GEMPABUMI</u></b></td>
				</tr>
				</font><FONT face="Arial Narrow" size=2>
				<tr>
					<FONT size=2>
					<td align="center">&nbsp; No: {{ $rownum }} / JYP /
						@if ($month == '1')
						IV
						@elseif ($month == '2')
						II
						@elseif ($month == '3')
						III
						@elseif ($month == '4')
						IV
						@elseif ($month == '5')
						V
						@elseif ($month == '6')
						VI
						@elseif ($month == '7')
						VII
						@elseif ($month == '8')
						VIII
						@elseif ($month == '9')
						IX
						@elseif ($month == '10')
						X
						@elseif ($month == '11')
						XI
						@else
						XII
						@endif
					 {{ $tahun }}</td>
				</tr>
			</table>
		</div>
		</font>
		<p>&nbsp;
		</p>
		<FONT face="Times New Roman" size=2>
		<div align="center">
			<table border="0" cellpadding="0" cellspacing="0" width="600">
				<tr>
					<td colspan="4" width="598">1. Telah terjadi <b> GEMPABUMI TEKTONIK</b></td>
				</tr>
				</font><FONT face="Arial Narrow" size=2>
				<tr>
					<td width="41"></td>
					<FONT face="Times New Roman" size=2>
					<td width="188">Pada hari</td>
					<td width="14">:</td>
					</font><FONT size=2>
					<td width="349">&nbsp;{{ $lapenda->tanggal}} </td>
				</tr>
				</font>
				<tr>
					<td width="41"></td>
					<FONT face="Times New Roman" size=2>
					<td width="188">Waktu gempa</td>
					<td width="14">:</td>
					</font><FONT size=2>
					<td width="349"> &nbsp;{{$lapenda->waktu}} WIT</td>
				</tr>
				</font>
				<tr>
					<td width="41"></td>
					<FONT face="Times New Roman" size=2>
					<td width="188">Pusat gempa</td>
					<td width="14">:</td>
					</font><FONT size=2>
					<td width="349">&nbsp;{{$lapenda->lintang}} - {{$lapenda->bujur}} </td>
				</tr>
				</font>
				<tr>
					<td width="41"></td>
					<FONT face="Times New Roman" size=2>
					<td width="188">Kedalaman</td>
					<td width="14">:</td>
					</font><FONT size=2>
					<td width="349"> &nbsp;{{$lapenda->kedalaman}}  Km</td>
				</tr>
				</font>
				<tr>
					<td width="41"></td>
					<FONT face="Times New Roman" size=2>
					<td width="188">Kekuatan</td>
					<td width="14">:</td>
					</font><FONT size=2>
					<td width="349"> &nbsp;{{$lapenda->magnitudo}} Skala Richter</td>
				</tr>
				</font>
				<tr>
					<td width="41"></td>
					<FONT face="Times New Roman" size=2>
					<td width="188" valign="top">Lokasi</td>
					<td width="14" valign="top">:</td>
					</font>
					<td width="349" valign="top">&nbsp;{{$lapenda->lokasi}}</td>
				</tr>
				<tr>
					<td width="41"></td>
					<FONT face="Times New Roman" size=2>
					<td width="188" valign="top">Dirasakan di</td>
					<td width="14" valign="top">:</td>
					</font>
					<td width="500" valign="top">&nbsp;{{ $lapenda->dirasakan }}</td>
				</tr>
				<tr>
					<td width="41"></td>
					<FONT face="Times New Roman" size=2>
					<td width="188" valign="top">Keterangan</td>
					<td width="14" valign="top">:</td>
					</font>
					<td width="500" valign="top">&nbsp;{{ $lapenda->tsunami }}</td>
				</tr>
			</table>
		</div>
		<div id="peta" align="center" style="margin-top: 20px;">
			<img src="http://office.dev/images/lapenda.png" width="480px" height="300px" alt="lokasi_gempa">
		</div>
		<div align="center"><br>
			<table border="0" cellpadding="0" cellspacing="0" width="600">
				<tr>
					<td width="17" valign="top" align="left"><FONT face="Times New Roman">2.</font></td>
					<td width="579" valign="top" align="left"><FONT face="Times New Roman">Demikian Berita Gempabumi yang dapat kami sampaikan untuk
					dipergunakan sebagaimana </FONT></td>
				</tr>
				</font><FONT face="Arial Narrow" size=2>
				<tr>
					<td width="17" valign="top" align="left"></td>
					<td width="579" valign="top" align="left"><FONT face="Times New Roman">mestinya.</td>
				</tr>
			</table>
		</div>
		</font>
		<p>&nbsp;</p>
		<div align="center" id="bawah">
			<table border="0" cellpadding="0" cellspacing="0" width="700" height="77">
				<tr>
					<td width="14" height="16"></td>
					<td width="212" height="16"></td>
					<FONT face="Times New Roman">
					<td align="center" width="380" height="16"><FONT face="Times New Roman">&nbsp;Jayapura, {{ $lapenda->created_at }}</td>
				</tr>
				</font>
				<tr>
					<td width="14" height="15"></td>
					<td width="212" height="15"></td>
					<td align="center" width="380" height="15"><FONT face="Times New Roman">STASIUN GEOFISIKA ANGKASAPURA - JAYAPURA</td>
				</tr>
				</font>
				<tr>
					<td width="14" height="15"></td>
					<td width="212" height="15"></td>
					<td align="center" width="380" height="15"><FONT face="Times New Roman">Ka. Stasiun<p>
						<FONT face="Times New Roman">
					Ttd</font></td>
				</tr>
				</font>
				<tr>
					<td width="14" height="15"></td>
					<td width="212" height="15"></td>
					<FONT face="Times New Roman" size=2>
					<td align="center" width="368" height="15"></td>
				</tr>
				</font>
				<tr>
					<td width="14" height="16"></td>
					<td width="212" height="16"></td>
					<td align="center" width="368" height="16"><FONT face="Times New Roman"> &nbsp;Cahyo Nugroho, S.E, S.Si</td>
				</tr>
				<tr>
					<td width="14" height="16"></td>
					<td width="212" height="16"></td>
					<td align="center" width="368" height="16"><FONT face="Times New Roman"> &nbsp;NIP:19750805
					1998031001</td>
				</tr>
			</table>
		</div>
		</font>
		<p style="line-height: 0" align="center">&nbsp; </p>
		<p align="center">&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		</font>
		</font>
		</font>
		</font>
		</font></b>
	</body>
</html>