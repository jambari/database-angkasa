<div class="m-t-10 m-b-10 p-l-10 p-r-10 p-t-10 p-b-10">
	<div class="row">
		<div class="col-md-8 center-block">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">{{ $cgplus->tanggal }}</h3>
				</div>
				<div class="box-body">
					<div>
						<p class="text-center label-primary">Frekuensi Sambaran Petir CG+ tanggal {{ $cgplus->tanggal }}
						</p>
					</div>
					<div class="chart">
						<canvas id="cegeBar" ></canvas>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="clearfix"></div>
<script>
$(function() {
	var barChartCanvas = $("#cegeBar").get(0).getContext("2d");
	var kindexBar = new Chart(barChartCanvas);
	var data = {
		labels: ["00", "01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18","19", "20", "21", "22", "23"],
		datasets: [
			{
		fillColor: "rgba(11, 80, 229, 0.67)",
		borderColor: "rgba(009, 001, 210)",
		strokeColor: "rgba(210, 214, 222, 1)",
		pointColor: "rgba(210, 214, 222, 1)",
		pointStrokeColor: "#c1c7d1",
		pointHighlightFill: "#fff",
		pointHighlightStroke: "rgba(220,220,220,1)",
		data: [{{ $cgplus->jam00 }}, {{ $cgplus->jam01 }}, {{ $cgplus->jam02 }}, {{ $cgplus->jam03 }}, {{ $cgplus->jam04 }}, {{ $cgplus->jam05 }}, {{ $cgplus->jam06 }}, {{ $cgplus->jam07 }}, {{ $cgplus->jam08 }}, {{ $cgplus->jam09 }}, {{ $cgplus->jam10 }}, {{ $cgplus->jam11 }}, {{ $cgplus->jam12 }}, {{ $cgplus->jam13 }}, {{ $cgplus->jam14 }}, {{ $cgplus->jam15 }}, {{ $cgplus->jam16 }}, {{ $cgplus->jam17 }}, {{ $cgplus->jam18 }}, {{ $cgplus->jam19 }}, {{ $cgplus->jam20 }}, {{ $cgplus->jam21 }},{{ $cgplus->jam22 }}, {{ $cgplus->jam23 }}
		]
	}
		]
	};
	var barChartOptions = {
		//Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
		scaleBeginAtZero: true,
		//Boolean - Whether grid lines are shown across the chart
		scaleShowGridLines: true,
		//String - Colour of the grid lines
		scaleGridLineColor: "rgba(0,0,0,.05)",
		//Number - Width of the grid lines
		scaleGridLineWidth: 1,
		//Boolean - Whether to show horizontal lines (except X axis)
		scaleShowHorizontalLines: true,
		//Boolean - Whether to show vertical lines (except Y axis)
		scaleShowVerticalLines: true,
		//Boolean - If there is a stroke on each bar
		barShowStroke: true,
		//Number - Pixel width of the bar stroke
		barStrokeWidth: 2,
		//Number - Spacing between each of the X value sets
		barValueSpacing: 5,
		//Number - Spacing between data sets within X values
		barDatasetSpacing: 1,
		//String - A legend template
		legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
		//Boolean - whether to make the chart responsive
		responsive: true,
		maintainAspectRatio: true
	};
	barChartOptions.datasetFill= false;
	kindexBar.Bar(data, barChartOptions);
	});
</script>