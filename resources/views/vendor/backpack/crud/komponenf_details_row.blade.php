<div class="m-t-10 m-b-10 p-l-10 p-r-10 p-t-10 p-b-10">
	<div class="row">
		<div class="col-md-8">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">{{ $komponenf->tanggal }}</h3>
				</div>
				<div class="box-body">
					<div>
						<p class="text-center label-primary">Grafik Komponen F tanggal {{ $komponenhf->tanggal }}</p>
					</div>
					<div class="chart">
						<canvas id="chartKompd" ></canvas>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="clearfix"></div>
	<script>
		    var barChartCanvas = $("#chartKompd").get(0).getContext("2d");
		    var areaChart = new Chart(barChartCanvas);
		        var areaChartData = {
		      labels: ["00", "01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18","19", "20", "21", "22", "23"],
		      datasets: [
		        {
		          label: "Tanggal",
		          fillColor: "rgba(60,141,188,0.9)",
		          strokeColor: "rgba(60,141,188,0.8)",
		          pointColor: "#3b8bba",
		          pointStrokeColor: "rgba(60,141,188,1)",
		          pointHighlightFill: "#fff",
		          pointHighlightStroke: "rgba(60,141,188,1)",
		          data: [{{ $komponenf->jam00 }}, {{ $komponenf->jam01 }}, {{ $komponenf->jam02 }}, {{ $komponenf->jam03 }}, {{ $komponenf->jam04 }}, {{ $komponenf->jam05 }}, {{ $komponenf->jam06 }}, {{ $komponenf->jam07 }}, {{ $komponenf->jam08 }}, {{ $komponenf->jam09 }}, {{ $komponenf->jam10 }}, {{ $komponenf->jam11 }}, {{ $komponenf->jam12 }}, {{ $komponenf->jam13 }}, {{ $komponenf->jam14 }}, {{ $komponenf->jam15 }}, {{ $komponenf->jam16 }}, {{ $komponenf->jam17 }}, {{ $komponenf->jam18 }}, {{ $komponenf->jam19 }}, {{ $komponenf->jam20 }}, {{ $komponenf->jam21 }},{{ $komponenf->jam22 }}, {{ $komponenf->jam23 }}]
		        }
		      ]
		    };
		    var areaChartOptions = {
		      //Boolean - If we should show the scale at all
		      showScale: true,
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
		      //Boolean - Whether the line is curved between points
		      bezierCurve: true,
		      //Number - Tension of the bezier curve between points
		      bezierCurveTension: 0.3,
		      //Boolean - Whether to show a dot for each point
		      pointDot: true,
		      //Number - Radius of each point dot in pixels
		      pointDotRadius: 4,
		      //Number - Pixel width of point dot stroke
		      pointDotStrokeWidth: 1,
		      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
		      pointHitDetectionRadius: 20,
		      //Boolean - Whether to show a stroke for datasets
		      datasetStroke: true,
		      //Number - Pixel width of dataset stroke
		      datasetStrokeWidth: 2,
		      //Boolean - Whether to fill the dataset with a color
		      datasetFill: true,
		      //String - A legend template
		      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
		      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
		      maintainAspectRatio: true,
		      //Boolean - whether to make the chart responsive to window resizing
		      responsive: true
		    };

		    //Create the line chart
		    var lineChartOptions = areaChartOptions;
		    lineChartOptions.datasetFill = false;
		    areaChart.Line(areaChartData, lineChartOptions);
	</script>