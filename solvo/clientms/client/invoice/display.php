<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid']==0)) {
  header('location:logout.php');
  } 
     ?>

<!DOCTYPE html>
<html>
<head>
	<title>DSR Report</title>
</head>
<body>
	
<!DOCTYPE HTML>
<html>
<head>
	<title>Vinayak & Co  </title>
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<!-- Custom CSS -->
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<!-- Graph CSS -->
	<link href="css/font-awesome.css" rel="stylesheet"> 
	<!-- jQuery -->
	<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
	<!-- lined-icons -->
	<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
	<!-- /js -->
	<script src="js/jquery-1.10.2.min.js"></script>
	<!-- //js-->
</head> 
<body>
	<div class="page-container">
		<!--/content-inner-->
		<div class="left-content">
			<div class="inner-content">
				<!-- header-starts -->
				<!-- //header-ends -->
				<!--outter-wp-->
				<div class="outter-wp">
					<!--sub-heard-part-->
					<div class="sub-heard-part">
						<ol class="breadcrumb m-b-0">
							<li><a href="dashboard.php">Home</a></li>
							<li class="active">Between dates reports</li>
						</ol>
					</div>
					<!--//sub-heard-part-->
					<div class="graph-visual tables-main">
						
					
						<h3 class="inner-tittle two">Between dates reports </h3>
						<div class="graph">
							<div class="tables">
							<?php include_once('includes/header.php');?>
			
						
	<h1>DSR Report</h1>
	<form method="POST" action="display_data.php">
		<label for="from_date">From Date:</label>
		<input type="date" id="from_date" name="from_date">
		<label for="to_date">To Date:</label>
		<input type="date" id="to_date" name="to_date">
		<button type="submit">Get Data</button>
	</form>
	<?php include_once('includes/sidebar.php');?>
<div class="clearfix"></div>		

</body>
</html>
