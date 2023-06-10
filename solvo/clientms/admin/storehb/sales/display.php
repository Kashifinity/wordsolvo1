<?php
session_start();
error_reporting(0);
include('../includes/dbconnection.php');
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
		<!--/content-inner-->
		<div class="left-content">
			<div class="inner-content">
				<!-- header-starts -->
				<!-- //header-ends -->
				<!--outter-wp-->
				<div class="outter-wp">
					<!--sub-heard-part-->
					<div class="sub-heard-part">
						
					<!--//sub-heard-part-->
					<div class="graph-visual tables-main">
					<h3>Daily Sales Report Store:-Habsiguda</h3>

					
						<h3 class="inner-tittle two"> </h3>
						<div class="graph">
							<div class="tables">
			
						
	<form method="POST" action="display_data.php">
		<label for="from_date">From Date:</label>
		<input type="date" id="from_date" name="from_date">
		<label for="to_date">To Date:</label>
		<input type="date" id="to_date" name="to_date">
		<label for="report_type">Report Type:</label>
		<select id="report_type" name="report_type">
			<option value="monthly">Monthly</option>
			<option value="quarterly">Quarterly</option>
			<option value="yearly">Yearly</option>
		</select>
		<button type="submit">Get Data</button>
	</form><br>
<br>
	<h1>Todays Report <?php echo date('d-m-Y') ?></h1>
	
	<div class="tables">
								<table class="table" style="color:black;  "> <thead> 
                                    <tr> <th>ID</th> 
									<th>Date</th>
									<th>Qty</th>
									 <th>Bill</th> 
									 <th>Amount</th>
									 <th>Total Bill</th>
									 <th>Qty </th> 
									 <th>Amount</th>
									 <th>Cash Sale</th>
									 <th>Card Sale</th>
									 <th>UPI Sale</th>
									 <th>Image</th>
									 
									
                                    </tr>
									   </thead>
  </div>
  </div>
  
  </div>
  
  </div>
  </div>
                                 <?php
    $db = mysqli_connect('localhost','root','','storehabsiguda');
	$query="SELECT dsr.*, dsrupload.CashSale, dsrupload.CardSale,dsrupload.upi,dsrupload.imageUpload FROM dsr JOIN dsrupload ON dsr.date = dsrupload.date   ORDER BY id DESC LIMIT 1";
	$row = mysqli_query($db,$query);
	$directory_path = __DIR__ . '/storehabsiguda/sales/upload';

    while($data = mysqli_fetch_array($row)){
        ?>
<tr >
<td><?=$data['id']?></td>
<td><?=$data['date']?></td>
<td><?=$data['total_bill']?></td>
<td><?=$data['qty']?></td>
<td><?=$data['amount']?></td>
<td><?=$data['bill']?></td>
<td><?=$data['quant']?></td>
<td><?=$data['amounts']?></td>
<td><?=$data['CashSale']?></td>
<td><?=$data['CardSale']?></td>
<td><?=$data['upi']?></td>
<td><img src="<?=$data['imageUpload']?>" width="100px" height="100px"></td>
</tr>


 
        <?php
    }



    ?>





									    <tbody>
									     </tbody> </table> 
							</div>

						</div>
				

	<?php include_once('../includes/sidebar.php');?>
<div class="clearfix"></div>		
<style>

	</style>
</body>
</html>