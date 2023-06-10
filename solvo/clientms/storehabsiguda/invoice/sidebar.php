<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<div class="sidebar-menu">
    <header class="logo">
        <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="dashboard.php"> <span id="logo"> <h1>VC</h1></span> 
            <!--<img id="logo" src="" alt="Logo"/>--> 
        </a> 
    </header>
    <div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
    <!--/down-->
    <div class="down">
    <?php
$uid=$_SESSION['clientmsuid'];
$sql="SELECT CompanyName from  tblclient where ID=:uid";
$query = $dbh -> prepare($sql);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>  
        <a href="dashboard.php"><span class=" name-caret"><?php  echo $row->CompanyName;?></span></a>
        <?php $cnt=$cnt+1;}} ?>
        <p>Store Manager</p>
        <ul>
            <li><a class="tooltips" href="../logout.php"><span>Log out</span><i class="lnr lnr-power-switch"></i></a></li>
        </ul>
    </div>
    <!--//down-->
    <div class="menu">
        <ul id="menu" >
        <li><a href="../dashboard.php"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>

            <li><a href="../sales/index.php"><i class="fa fa-tachometer"></i> <span>Daily Sales Report</span></a></li>

            
            <li><a href="../invoice/index.php"><i class="fa fa-file-text-o"></i> <span>Invoices</span></a></li>
            <li><a href="../pettycash/index.php"><i class="fa fa-file-text-o"></i> <span>Petty Cash</span></a></li>

            <li><a href="../attendance/index.php"><i class="fa fa-file-text-o"></i> <span>Attendance</span></a></li>

            <li><a href="../mis.php"><i class="fa fa-file-text-o"></i> <span>House Keeping Material</span></a></li>

           
            <li><a href="../dailyupload/index.php"><i class="fa fa-picture-o"></i> <span>Grooming Picture</span></a></li>
         
        </ul>
    </div>

</div>
<script src="../js/jquery.nicescroll.js"></script>
	<script src="../js/scripts.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery-1.10.2.min.js"></script>
<script src="../js/amcharts.js"></script>	
<script src="../js/serial.js"></script>	
<script src="../js/light.js"></script>	
<script src="../js/radar.js"></script>	
<script src="../js/css3clock.js"></script>
<!--Easy Pie Chart-->
<!--skycons-icons-->
<script src="../js/skycons.js"></script>

<script src="../js/jquery.easydropdown.js"></script>
<script type="text/javascript" src="../js/vroom.js"></script>
<script type="text/javascript" src="../js/TweenLite.min.js"></script>
<script type="text/javascript" src="../js/CSSPlugin.min.js"></script>
<script src="../js/jquery.nicescroll.js"></script>
<script src="../js/scripts.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>

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
>
<link rel="stylesheet" href="../css/vroom.css">
<script type="text/javascript" src="../js/vroom.js"></script>
<script type="text/javascript" src="../js/TweenLite.min.js"></script>
<script type="text/javascript" src="../js/CSSPlugin.min.js"></script>
<script src="../js/jquery.nicescroll.js"></script>
<script src="../js/scripts.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>

