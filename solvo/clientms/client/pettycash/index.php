<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsuid']==0)) {
  header('location:logout.php');
  } else{
  	?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Vinayak & Co  || Daily Sales Report </title>
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
<div class="left-content">
			<div class="inner-content">
				<!-- header-starts -->
				<!-- //header-ends -->
				<!--outter-wp-->

               <div class="outter-wp">
				<h1> Petty Cash <?php echo date('d-m-y')?> </h1>
				<br><br>
		
<form class="row" method="post" action="connect.php" enctype="multipart/form-data">
   
<div class="form-group col-md-3 m-t-20">
 
           <label for="PettyDate">Date of Submission</label>
                <input type="date" class="form-control form-control-line" id="PettyDate" name="PettyDate" >
  </div>             
 <div class="form-group col-md-4 m-t-20">
        <label>Particulars</label>
            
        <input type="text"  id="Particular" name="Particular" class="form-control form-control-line" placeholder="Particulars" > 
    </div>
    <div class="form-group col-md-4 m-t-20">
        <label>Opening Balance </label>
        <input type="text" id="OBalance" name="OBalance" class="form-control form-control-line" value="" placeholder="Opening Balance" > 
    </div>
    <div class="form-group col-md-4 m-t-20">
        <label>Closing Balance </label>
        <input type="text"  id="ClosinBalance"name="ClosinBalance" class="form-control form-control-line" placeholder="Closing Balance"> 
    </div>
    <div class="form-group col-md-4 m-t-20">
        <label>Expenditure</label>
        <input type="text" id="Expenditure" name="Expenditure" class="form-control"  placeholder="Expenditure" > 
    </div>
    <div class="form-group col-md-3 m-t-20">
    
    <label for="imageUpload"> Image</label>
                <input type="file" class="form-control-file" id="imageUpload" name="imageUpload">
  </div> 
    <div class="form-actions col-md-12">
        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Send</button>
        <button type="button" class="btn btn-danger">Cancel</button>
    </div>
</form>
</div>
<?php include_once('includes/sidebar.php');?>
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
	<!--js -->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>

</script>
</body>
</html>
<?php }  ?>