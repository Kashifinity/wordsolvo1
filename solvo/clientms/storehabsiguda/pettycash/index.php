<?php
session_start();
error_reporting(0);
include('../includes/dbconnection.php');
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
	<title>Petty Cash</title>
</head>
<body>
	<form method="post" enctype="multipart/form-data" action="connect.php">
		<label for="date">Date:</label>
		<input type="date" name="date" required><br><br>
		<label for="expenditure">Expenditure:</label>
		<input type="number" name="expenditure" required><br><br>
		<label for="particulars">Particulars:</label>
		<input type="text" name="particulars" required><br><br>
		<label for="image">Image:</label>
		<input type="file" name="image"><br><br>
		<input type="submit" name="submit" value="Submit">
	</form>	</form>
	
<?php include_once('sidebar.php');?>
		<div class="clearfix"></div>		

		<div class="graph">
							<div class="tables">
								<table class="table" style="color:black;"> <thead> 
                                    <tr> <th>ID</th> 
									<th>Date</th>
									<th>Expenditure</th>
									 <th>Particular</th> 
									 <th>Closing Balance</th>
									 
									
                                    </tr>
									   </thead>
  </div>
	<?php
    $db = mysqli_connect('localhost','root','','storehabsiguda');
    $query="SELECT * FROM expenditure   ORDER BY id DESC LIMIT 1";
    $row = mysqli_query($db,$query);

    while($data = mysqli_fetch_array($row)){
        ?>
<tr >
	
<td><?=$data['']?></td>
<td><?=$data['date']?></td>
<td><?=$data['expenditure']?></td>
<td><?=$data['particulars']?></td>
<td><?=$data['closing_balance']?></td>

</tr>


 
        <?php
    }



    ?>



</body>
</html>

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