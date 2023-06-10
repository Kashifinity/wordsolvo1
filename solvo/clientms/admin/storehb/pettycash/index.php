<?php
session_start();
error_reporting(0);
include('../includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid']==0)) {
  header('location:logout.php');
  } else{
  	?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Vinayak & Co  || Daily Sales Report </title>
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- Bootstrap Core CSS -->
	<link href="../css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<!-- Custom CSS -->
	<link href="../css/style.css" rel='stylesheet' type='text/css' />
	<!-- Graph CSS -->
	<link href="../css/font-awesome.css" rel="stylesheet"> 
	<!-- jQuery -->
	<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
	<!-- lined-icons -->
	<link rel="stylesheet" href="../css/icon-font.min.css" type='text/css' />
	<!-- /js -->
	<script src="../js/jquery-1.10.2.min.js"></script>
	<!-- //js-->
</head> 
<body>
<div class="page-container">
<div class="left-content">
			<div class="inner-content">
				<!-- header-starts -->
				<!-- //header-ends -->
				<!--outter-wp-->

               <div class="outter-wp">
				<h1> Petty Cash <?php echo date('d-m-y')?> </h1>
				<br><br>
				<!DOCTYPE html>
<html>
<head>
	<title>Expenditure Tracker</title>
</head>
<body>
	<h1>Expenditure Tracker</h1>
	<form method="post" enctype="multipart/form-data" action="connect.php">
		<label for="opening_balance">Opening Balnce:</label>
		<input type="number" name="opening_balance" required><br><br>
			<label for="particulars">Particulars:</label>
		<input type="text" name="particulars" required><br><br>
		<label for="image">Image:</label>
		<input type="file" name="image"><br><br>
		<input type="submit" name="submit" value="Submit">
	</form>	</form>
	
</body>
</html>

<?php include_once('../includes/sidebar.php');?>
		<div class="clearfix"></div>		

		<script>
		var toggle = true;

		$(".sidebar-icon").click(function() {                
			if (toggle)
			{
				$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
				$("#menu span").css({"position":"absolute"});
			}
			else
			{
				$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
				setTimeout(function() {
					$("#menu span").css({"position":"relative"});
				}, 400);
			}

			toggle = !toggle;
		});
	</script>

<script type="text/javascript">
$(function() {
  var interval = setInterval(function() {
    var momentNow = moment();
    $('#date').html(momentNow.format('dddd').substring(0,3).toUpperCase() + ' - ' + momentNow.format('MMMM DD, YYYY'));  
    $('#time').html(momentNow.format('hh:mm:ss A'));
  }, 100);

});
</script>
	<!--js -->
	<script src="../js/jquery.nicescroll.js"></script>
	<script src="../js/scripts.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="../js/bootstrap.min.js"></script>


</body>
</html>
<?php }  ?>