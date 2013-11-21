<?php
include ("config.inc.php");

$results = $mysqli -> query("SELECT COUNT(*) as t_records FROM dust_val");
$total_records = $results -> fetch_object();
$total_groups = ceil($total_records -> t_records / $items_per_group);
$results -> close();

//$time = strtotime($dateInUTC.'KST');
//$dateInLocal = date("Y-m-d H:i:s",$time);
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!--<meta http-equiv='refresh' content='30;url=http://117.16.146.81/dust-portal'>-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="shortcut icon" href="./static/favicon.ico" type="image/x-icon">
		<link rel="icon" href="./static/favicon.ico" type="image/x-icon">

		<title>Indoor Dust Monitor</title>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.1/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.1/css/bootstrap-theme.min.css">

		<!-- Custom styles for this template -->
		<link rel="stylesheet" href="./static/css/dust-portal.css" >

		<!-- Just for debugging purposes. Don't actually copy this line! -->
		<!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->
	</head>

	<body>
		<div class="container">
			<div class="header">
				<h3 class="text-muted text-center"><a href="http://117.16.146.81/dust-portal/dust.php"><strong>Real-time</strong> Indoor Dust Monitoring System</a></h3>
				<!--
				<ul class="nav nav-pills pull-right">
					<li><a id="home" class="active" href="#">Home</a></li>
					<li><a id="settings"href="#">Settings</a></li>
					<li><a id="about" href="#">About</a></li>
				</ul>
				-->
			</div>
			
			<div class="row">
				<div id="symbol-info" class="col-md-6 col-lg-6">
					<p class="text-primary text-center">Dust Standard</p>
					<div id="symbol"></div>
				</div>
				<div id="time-info" class="grid-block col-md-6 col-lg-6">
					<strong>Current Time: <span id="clock"></span></strong>
				</div>
			</div>
			<div class="row">
				<div id="max-info" class="grid-block col-md-6 col-lg-6">
					<strong>Today's Max Value</strong>
				</div>
				<div id="dust-info" class="grid-block col-md-6 col-lg-6">
					<strong>Current Dust Value</strong>
				</div>
	
			</div>
			
			
			<div class="footer">Copyright at <strong>K2V</strong> in 2013 Fusion Project Class</div>
		</div><!-- /.container -->

		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.1/js/bootstrap.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/prototype/1.7.1.0/prototype.js"></script>
		<script type="text/javascript"> 
			new Ajax.PeriodicalUpdater('clock', 'clock.php', {method: 'get', frequency: 1 });
		</script>
	</body>
</html>