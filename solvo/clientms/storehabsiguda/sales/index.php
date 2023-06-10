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
	
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
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
	<script src="js/jquery-1.10.2.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
							<li class="active">Daily Sales Report </li>
						</ol>
					</div>
			<h1> Daily Sales Report <?php echo date('d-m-Y') ?></h1>
					<p id="date"></p>
      <p id="time" class="bold"></p>
  
      <p> Import CSV File </p>
					<form method="post" action="import.php" enctype="multipart/form-data">
    <input type="file" name="excel_file" accept=".csv">
    <input type="submit" name="import" value="Import" >

    </form>
	<form method="post" action="upload.php" enctype="multipart/form-data">
	<div class="form-group">
                <label for="SaleDate">Date of Submission</label>
                <input type="date" class="form-control" id="date" name="date" required>
              </div>
              
	<div class="form-group">
                <label for="CashSale">Cash Sale</label>
                <input
                  type="number"
                  class="form-control"
                  id="CashSale"
                  name="CashSale"
                />
              </div>
              <div class="form-group">
                <label for="CardSale">Card Sale</label>
                <input
                  type="text"
                  class="form-control"
                  id="CardSale"
                  name="CardSale"
                />
              </div>
              <div class="form-group">
                <label for="upi">Upi </label>
                <input
                  type="number"
                  class="form-control"
                  id="upi"
                  name="upi"
                  />
              </div>
			  <form action="upload.php" method="post" enctype="multipart/form-data">
          
              <div class="form-group">
                <label for="imageUpload">Cash Slip Image</label>
                <input type="file" class="form-control-file" id="imageUpload" name="imageUpload" >
              </div>
              <div class="form-group">
                <label for="image">Card Slip Image</label>
                <input type="file" class="form-control-file" id="image " name="image" >
              </div>
              
              <input type="submit" class="btn btn-primary" />
            </form>
      
        
						<h3 class="inner-tittle two"></h3>
                        
						<div class="graph">
							<div class="tables">
								<table class="table" style="color:black;"> <thead> 
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
									 <th>Cash Slip</th>
									 <th>Card Slip</th>
									 
									
                                    </tr>
									   </thead>
  </div>
  </div>
  
  </div>
  
  </div>
  </div>
                                 <?php
    $db = mysqli_connect('localhost','root','','storehabsiguda');
    $query="SELECT dsr.*, dsrupload.CashSale, dsrupload.CardSale,dsrupload.upi,dsrupload.imageUpload,dsrupload.image FROM dsr JOIN dsrupload ON dsr.date = dsrupload.date   ORDER BY id DESC LIMIT 1";
    $row = mysqli_query($db,$query);

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
<td><img src="<?=$data['imageUpload']?>" width="100" height="100"></td>
<td><img src="<?=$data['image']?>" width="100" height="100"></td>

</tr>
	


 
        <?php
    }



    ?>





									    <tbody>
									     </tbody> </table> 
							</div>

						</div>
				
					</div>
					<!--//graph-visual-->
				</div>
				<!--//outer-wp-->
					</div>
		</div>
		<!--//content-inner-->
		<!--/sidebar-menu-->
		<?php include_once('sidebar.php');?>
		<div class="clearfix"></div>		
	</div>
	

<!--js -->
<link rel="stylesheet" href="../css/vroom.css">
<script type="text/javascript" src="js/vroom.js"></script>
<script type="text/javascript" src="js/TweenLite.min.js"></script>
<script type="text/javascript" src="js/CSSPlugin.min.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>


<script>

var toggleSidebarBtn = document.getElementById('toggle-sidebar');
var sidebarMenu = document.querySelector('.sidebar-menu');

toggleSidebarBtn.addEventListener('click', function() {
  sidebarMenu.classList.toggle('minimized');
});

</script>
</body>
</html>
<?php }  ?>
