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
        <a href="dashboard.php"><img src="images/admin10.jpg" height="100" width="100"></a>
        <a href="dashboard.php"><span class=" name-caret"><?php  echo $row->CompanyName;?></span></a>
        <?php $cnt=$cnt+1;}} ?>
        <p>Store Manager</p>
        <ul>
            <li><a class="tooltips" href="client-profile.php"><span>Profile</span><i class="lnr lnr-user"></i></a></li>
            <li><a class="tooltips" href="change-password.php"><span>Settings</span><i class="lnr lnr-cog"></i></a></li>
            <li><a class="tooltips" href="logout.php"><span>Log out</span><i class="lnr lnr-power-switch"></i></a></li>
        </ul>
    </div>
    <!--//down-->
    <div class="menu">
        <ul id="menu" >
        <li><a href="dashboard.php"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>

            <li><a href="sales/index.php"><i class="fa fa-tachometer"></i> <span>Daily Sales Report</span></a></li>

            
            <li><a href="invoice/index.php"><i class="fa fa-file-text-o"></i> <span>Invoices</span></a></li>
            <li><a href="pettycash/index.php"><i class="fa fa-file-text-o"></i> <span>Petty Cash</span></a></li>

            <li><a href="attendance/index.php"><i class="fa fa-file-text-o"></i> <span>Attendance</span></a></li>

            <li><a href="mis.php"><i class="fa fa-file-text-o"></i> <span>MIS</span></a></li>

           
            <li><a href="dailyupload/index.php"><i class="fa fa-search"></i> <span>Upload</span></a></li>
         
        </ul>
    </div>
</div>