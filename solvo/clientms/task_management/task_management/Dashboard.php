
<?php
include './includes/admin_header_in.php';
include './includes/data_base_save_update.php';
//include 'includes/App_Code.php';
include 'includes/App_Code.php';
$AppCodeObj=new App_Code();

// found work


$msg = '';
$Genrate = new App_Code();
$appC0de = new databaseSave();
if (isset($_GET['UserID']) && isset($_GET['Status'])) {

    $userID = $_GET['UserID'];
    $Inactive = $_GET['Status'];
    $msg = $Inactive;
    if ($Inactive == '1') {

        $query = "UPDATE `user_details` SET `Inactive`='0' WHERE User_ID='$userID'";
        $Active_User = mysqli_query($connection, $query);
        if (!$Active_User) {
            die('QUERY FAILD' . mysqli_error($connection));
        }
    } else if ($Inactive == '0') {
        //   echo $Inactive;
        $query = "UPDATE `user_details` SET `Inactive`='1' WHERE User_ID='$userID'";
        $deactive_User = mysqli_query($connection, $query);
        if (!$deactive_User) {
            die('QUERY FAILD' . mysqli_error($connection));
        }
    }
    //  header("location:./admin/retailer_account_list.php");
}


?>
<head>
<!-- Favicons-->
<link rel="icon" href="img/favicon/favicon_32x32.png" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="img/favicon/apple-touch-icon-152x152.png">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="img/favicon/mstile-144x144.png">
  <!-- For Windows Phone -->
</head>
<!--------------------
START - Breadcrumbs
-------------------->
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><span>Dashboard</span></li>
    <li class="breadcrumb-item"><a href="index.php">Logout</a></li>
</ul>
<!--------------------
END - Breadcrumbs
-------------------->
<div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
<div class="content-i">
    <div class="content-box">
                          
        <?php         
        if($_SESSION['User_type']=='admin')
        {
               include './includes/admin_dashboard.php';  
        } 
        elseif($_SESSION['User_type']=='QA')
        {
               include './includes/qa_dashboard.php';  
        } 
 else {
       include './includes/emp_dashboard.php';   
 }
 
      
        
        ?>
      
    </div>
       


    </div>



  
</div>


<?php include './includes/admin_footer.php'; ?>
        
        <script>
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'pdfHtml5'
        ]
    } );
} );
        </script>