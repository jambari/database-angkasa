<div class="m-t-10 m-b-10 p-l-10 p-r-10 p-t-10 p-b-10">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<table class="table table-striped table-bordered">
				<tr>
					<td>Peak Stroke</td>
					<td>Time</td>
					<td>Peak Flash</td>
					<td>Time</td>
					<td>Peak Noise</td>
					<td>Time</td>
					<td>Peak Energy</td>
					<td>Time</td>
					<td>Energy Ratio</td>
					<td>Time</td>
					<td>Peak Signal</td>
					<td>Signal</td>
				</tr>
				<tr>
					<td> {{ $summary->peak_stroke }} </td>
					<td> {{ $summary->time_stroke }} </td>
					<td> {{ $summary->peak_flash }} </td>
					<td> {{ $summary->time_flash }} </td>
					<td> {{ $summary->peak_noise }} </td>
					<td> {{ $summary->time_noise }} </td>
					<td> {{ $summary->peak_energy }} </td>
					<td> {{ $summary->time_energy }} </td>
					<td> {{ $summary->energy_ratio }} </td>
					<td> {{ $summary->time_ratio }} </td>
					<td> {{ $summary->peak_signal }} </td>
					<td> {{ $summary->time_signal }} </td>
				</tr>
			</table>
			</div>
		</div>
	</div>
</div>
<div class="clearfix"></div>