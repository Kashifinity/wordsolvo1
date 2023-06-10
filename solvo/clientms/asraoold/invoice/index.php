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
	<title>Vinayak & Co  || Purchase Invoice </title>
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
				<?php include_once('includes/header.php');?>
				<!-- //header-ends -->
				<!--outter-wp-->
				

               <div class="outter-wp">
					<!--sub-heard-part-->
					<div class="sub-heard-part">
						<ol class="breadcrumb m-b-0">
						<h1> Purchase Invoice <?php echo date('d-m-Y') ?></h1>
			
							<li><a href="dashboard.php">Home</a></li>
							<li class="active">Purchase </li>
						</ol>
					</div>
					<p> Import CSV File </p>
					<form method="post" action="import.php" enctype="multipart/form-data">
    <input type="file" name="excel_file" accept=".csv">
    <input type="submit" name="import" value="Import">
    </form>
        

	<form method="post" action="upload.php" enctype="multipart/form-data">
	<div class="form-group">
                <label for="date">Date of Submission</label>
                <input type="date" class="form-control" id="date" name="date" required>
              </div>
           
	
              <div class="form-group">
                <label for="upi">Net Value </label>
                <input
                  type="number"
                  class="form-control"
                  id="value"
                  name="value"
                  />
              </div>
			  <form action="upload.php" method="post" enctype="multipart/form-data">
          
              <div class="form-group">
                <label for="imageUpload">Cash Slip Image</label>
                <input type="file" class="form-control-file" id="imageUpload" name="imageUpload" >
              </div>
              
              <input type="submit" class="btn btn-primary" />
            </form>
					
					
						<h3 class="inner-tittle two"></h3>
                        
						<div class="graph">
							<div class="tables">
								<table class="table" style="color:black;"> <thead> 
                                    <tr> 
									<th>DOC Date</th>
									<th>Bill Number</th>
									 <th>Reason</th> 
									 <th>DC Number</th>
									 <th>DC Date</th>
									 <th>DOC Quantity </th> 
									 <th>Net Value</th>
									 <th>Net Value</th>
									 <th>Image</th>
									 
									
                                    </tr>
									   </thead>
  </div>
  </div>
  
  </div>
  
  </div>
  </div>
                                 <?php
    $db = mysqli_connect('localhost','root','','asraoold');
    $query="SELECT invoice.*, invoiceupload.value, invoiceupload.imageUpload FROM invoice JOIN invoiceupload ON invoice.date = invoiceupload.date   ORDER BY id DESC LIMIT 1";
    $row = mysqli_query($db,$query);

    while($data = mysqli_fetch_array($row)){
        ?>
<tr >
<td><?=$data['date']?></td>
<td><?=$data['billNo']?></td>
<td><?=$data['reason']?></td>
<td><?=$data['dcno']?></td>
<td><?=$data['dcdate']?></td>
<td><?=$data['dcqty']?></td>

<td><?=$data['netValue']?></td>
<td><?=$data['value']?></td>

<td><img src="<?=$data['imageUpload']?>" width="100" height="100"></td>

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
	<!--js -->
	<script src="../js/jquery.nicescroll.js"></script>
	<script src="../js/scripts.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>
<?php }  ?>