 <style>
     .sidebaricon{
        transform: rotate(90deg);
   transition: all 300ms ease-in-out;
   margin-right: 0.8em;
       margin-top: -8px;
	   color: #462D88;
    background: #ffffff;
    border-radius: 0;
    transform: rotate(0deg);
  transition: all 300ms ease-in-out;
  margin-top: -2px;
   ;
    text-align: right;
    line-height: 1;
    font-size: 19px;
    padding: 8px 10px;
    border-radius: 0px;
    color: #fff;
    background: #462D88;
    float: right;
     }

     #menuu li a {
 font-style: normal;

    font-weight: 900;
    position: relative;
    display: block;
    padding: 13px 20px;
    color: #462D88;
    white-space: nowrap;
    width: 200px;
    z-index: 2;
    background-color: #ffffff;
    font-size:0.9em;
    font-family: 'Roboto', sans-serif;
	border:none;
	    border-left: 4px solid #021F4E;
}

#menuu li a:hover {
  color: #ffffff;
  background-color:#462D88;
  transition: color 250ms ease-in-out, background-color 250ms ease-in-out;
   
}
 </style>
 
 <div class="">
    <header class="">
        <a href="#" class="sidebaricon"> <span class="fa fa-bars"></span> </a> <a href="dashboard.php"> <span id="logo"> <h1>Word Solvo</h1></span>
         
        </a> 
    </header>
    <div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
    <!--/down-->
    <div class="down">  
        <?php
$aid=$_SESSION['clientmsaid'];
$sql="SELECT AdminName from  tbladmin where ID=:aid";
$query = $dbh -> prepare($sql);
$query->bindParam(':aid',$aid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
        <a href="dashboard.php"><img src="images/images.jpg" height="70" width="70"></a>
        <a href="dashboard.php"><span class=" name-caret"><?php  echo $row->AdminName;?></span></a>
        
        <?php $cnt=$cnt+1;}} ?>
        <ul>
            <li><a class="tooltips" href="admin-profile.php"><span>Profile</span><i class="lnr lnr-user"></i></a></li>
            <li><a class="tooltips" href="change-password.php"><span>Settings</span><i class="lnr lnr-cog"></i></a></li>
            <li><a class="tooltips" href="logout.php"><span>Log out</span><i class="lnr lnr-power-switch"></i></a></li>
        </ul>
    </div>
    <!--//down-->
    <div class="menu">
        <ul id="menuu" >
            <li><a href="dashboard.php"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>

            <li><a href="stores.php"><i class="fa fa-tachometer"></i> <span>Daily Sales Report</span></a></li>

            
            <li><a href="stores.php"><i class="fa fa-file-text-o"></i> <span>Invoices</span></a></li>
            <li><a href="stores.php"><i class="fa fa-file-text-o"></i> <span>Petty Cash</span></a></li>

            <li><a href="stores.php"><i class="fa fa-file-text-o"></i> <span>Attendance</span></a></li>

            <li><a href="stores.php"><i class="fa fa-file-text-o"></i> <span>House keeping Materials</span></a></li>

           
            <li><a href="stores.php"><i class="fa fa-picture-o"></i> <span>Grooming Picture</span></a></li>
         
      
        </ul>
    </div>
</div>



    <!-- js -->
    <script src="../js/jquery-2.2.3.min.js"></script>
    <!-- //js -->
    <!-- start-smooth-scrolling -->
    <script src="../js/move-top.js"></script>
    <script src="../js/easing.js"></script>
    <script>
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();

                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>
    <!-- //end-smooth-scrolling -->
    <!-- smooth-scrolling-of-move-up -->
    <script>
        $(document).ready(function () {
            /*
            var defaults = {
                containerID: 'toTop', // fading element id
                containerHoverID: 'toTopHover', // fading element hover id
                scrollSpeed: 1200,
                easingType: 'linear' 
            };
            */

            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>
    <script src="../js/SmoothScroll.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>