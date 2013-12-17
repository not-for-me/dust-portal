<?php
include ("header.php");
?>
			<script type="text/javascript">
			google.load("visualization", "1", {packages:["corechart"]});
			google.setOnLoadCallback(drawChart);
			function drawChart() {
				var jsonData = jQuery.ajax({
					url: "chart_process.php",
					dataType:"json",
					async: false
				}).responseText;
			
				//alert(jsonData);
						
				// Create our data table out of JSON data loaded from server.
				var data = new google.visualization.DataTable(jsonData);
				var options = {
					title: 'Raw Dust Info',
					seriesType: "line",
          			series: { 2: {type: "bars"}},
          			vAxis: {
						     0: {
						         viewWindow: {
						             min: 0,
						             max: 100000
						         }
						     },
						     1: {
						         viewWindow: {
						             min: 0,
						             max: 2
						         }
						     }
						 }
				};
			
				var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
				chart.draw(data, options);
			
				function resizeHandler () {
			        chart.draw(data, options);
			    }
			    if (window.addEventListener) {
			        window.addEventListener('resize', resizeHandler, false);
			    }
			    else if (window.attachEvent) {
			        window.attachEvent('onresize', resizeHandler);
			    }
				
			}
			
			
			</script>
			<div id="chart_div"></div>
		
			<div class="footer text-center">
				Copyright at <strong>K2V</strong> in 2013 Fusion Project Class
			</div>
		</div><!-- /.container -->
	</body>
</html>