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
	<title>Vinayak & Co || Search Invoice </title>
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
				<?php include_once('includes/header.php');?>
				<!-- //header-ends -->
				<!--outter-wp-->
				<div class="outter-wp">
					
				<div class="card-header">
                        <h4>Particulars</h4>
                    </div>
                    <div class="card-body">

                        <form action="code.php" method="POST">
						<div class="form-group">
                <label for="SaleDate">Date of Submission</label>
                <input type="date" class="form-control" id="SaleDate" name="SaleDate" required>
              </div>
             
                            <div class="form-group mb-3 col-lg-6">
                                <input type="checkbox" name="brands[]" value="Lizol"> Lizol <br>
                                <input type="checkbox" name="brands[]" value="Dish wash soap"> Dish wash soap <br>
                                <input type="checkbox" name="brands[]" value="Washing Powder"> Washing Powder <br>
                                <input type="checkbox" name="brands[]" value="ACID BOTTLE"> ACID BOTTLE <br>
                                <input type="checkbox" name="brands[]" value="Handash liquid"> Handash liquid <br>
								
                                <input type="checkbox" name="brands[]" value="Wooden broomstick"> Wooden broomstick <br>
                                <input type="checkbox" name="brands[]" value="Wet mop stick"> Wet mop stick <br>
                                <input type="checkbox" name="brands[]" value="Dustbin cover"> Dustbin cover <br>
                                <input type="checkbox" name="brands[]" value="Odonil"> Odonil <br>
                                <input type="checkbox" name="brands[]" value="Scraber"> Scraber<br>
					
								<input type="checkbox" name="brands[]" value="CUTTER">CUTTER<br>
                                <input type="checkbox" name="brands[]" value="Duster">Duster<br>
                                <input type="checkbox" name="brands[]" value="Dry mop"> Dry mop <br>
                                <input type="checkbox" name="brands[]" value="Dust bin"> Dust bin <br>
                                <input type="checkbox" name="brands[]" value="Pitambar"> Pitambar<br>
								<input type="checkbox" name="brands[]" value="Artikapor"> Artikapor <br>
                                <input type="checkbox" name="brands[]" value="Dust Bin Bags (Big)"> Dust Bin Bags (Big) <br>
                                <input type="checkbox" name="brands[]" value="Dust Bin Bags (SMALL)"> Dust Bin Bags (SMALL) <br>
                                
                      
							</div>
							
                            <div class="form-group mb-3 col-lg-6">
                                <input type="checkbox" name="brands[]" value="colin"> Colin <br>
                                <input type="checkbox" name="brands[]" value="tissue"> Tissue<br>
								
                                <input type="checkbox" name="brands[]" value="Drinking Water bottles"> Drinking Water bottles <br>
                                <input type="checkbox" name="brands[]" value="Pens"> Pens <br>
                                <input type="checkbox" name="brands[]" value="A-4 Sheets"> A-4 Sheets <br>
                                <input type="checkbox" name="brands[]" value="Cleaning Clothes">Cleaning Clothes<br>
                                <input type="checkbox" name="brands[]" value="Room Freshner (Godrej)"> Room Freshner (Godrej)<br>
					
								<input type="checkbox" name="brands[]" value="Dusting Dusters">Dusting Dusters<br>
                                <input type="checkbox" name="brands[]" value="Agarbati">Agarbati<br>
                                <input type="checkbox" name="brands[]" value="Pooja Oil bottle"> Pooja Oil bottle <br>
                                <input type="checkbox" name="brands[]" value="WATER BUCKET"> WATER BUCKET <br>
                                <input type="checkbox" name="brands[]" value="SETTER LOCKERS "> SETTER LOCKERS <br>
								<input type="checkbox" name="brands[]" value="WATER MUG"> WATER MUG <br>
                                <input type="checkbox" name="brands[]" value="VATHULU">VATHULU <br>
                                <input type="checkbox" name="brands[]" value="PLATES ">PLATES <br>
								<input type="checkbox" name="brands[]" value="BROWN TAPE">BROWN TAPE <br>
                                <input type="checkbox" name="brands[]" value="POOJA BELL">POOJA BELL<br>
                                <input type="checkbox" name="brands[]" value="OIL LAMP ">OIL LAMP <br>
                      
							</div>
                            <div class="form-group mb-3">
                                <button type="submit" name="save_multiple_checkbox" class="btn btn-primary">Save Multiple Checkbox</button>
                            </div>

                        </form>

			
			
			</div>
				<!--//outer-wp-->
				</div>
		</div>
		<!--//content-inner-->
		<!--/sidebar-menu-->
		<?php include_once('includes/sidebar.php');?>
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
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php }  ?>