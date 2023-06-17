<?php
include 'includes/connect.php';

if(isset($_SESSION['user_id']))
{
include 'includes/wallet.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <title>Solvo</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

  <!-- Favicons-->
  <link rel="icon" href="images/favicon/favicon_32x32.png" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
  <!-- For Windows Phone -->


  <!-- CORE CSS-->
  <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <!-- Custome CSS-->    
  <link href="css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  
   <style type="text/css">
  .input-field div.error{
    position: relative;
    top: -1rem;
    left: 0rem;
    font-size: 0.8rem;
    color:#FF4081;
    -webkit-transform: translateY(0%);
    -ms-transform: translateY(0%);
    -o-transform: translateY(0%);
    transform: translateY(0%);
  }
  .input-field label.active{
      width:100%;
  }
  .left-alert input[type=text] + label:after, 
  .left-alert input[type=password] + label:after, 
  .left-alert input[type=email] + label:after, 
  .left-alert input[type=url] + label:after, 
  .left-alert input[type=time] + label:after,
  .left-alert input[type=date] + label:after, 
  .left-alert input[type=datetime-local] + label:after, 
  .left-alert input[type=tel] + label:after, 
  .left-alert input[type=number] + label:after, 
  .left-alert input[type=search] + label:after, 
  .left-alert textarea.materialize-textarea + label:after{
      left:0px;
  }
  .right-alert input[type=text] + label:after, 
  .right-alert input[type=password] + label:after, 
  .right-alert input[type=email] + label:after, 
  .right-alert input[type=url] + label:after, 
  .right-alert input[type=time] + label:after,
  .right-alert input[type=date] + label:after, 
  .right-alert input[type=datetime-local] + label:after, 
  .right-alert input[type=tel] + label:after, 
  .right-alert input[type=number] + label:after, 
  .right-alert input[type=search] + label:after, 
  .right-alert textarea.materialize-textarea + label:after{
      right:70px;
  }
  .logoo{
    width:250px;
    padding: 20px;
    
  }
  </style> 
</head>

<body>
  <!-- Start Page Loading -->
  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->

  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START HEADER -->
  <header id="header" class="page-topbar">
        <!-- start header nav-->
       <img src="./images/logo.png" class="logoo">
       
        <!-- end header nav-->
  </header>
  <!-- END HEADER -->

  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START MAIN -->
  <div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">

      <!-- START LEFT SIDEBAR NAV-->
      <aside id="left-sidebar-nav">
        <ul id="slide-out" class="side-nav fixed leftside-navigation">
            <li class="user-details  light-blue darken-2">
            <div class="row">
                <div class="col col s4 m4 l4">
                    <img src="images/userav.png" alt="" class="circle responsive-img valign profile-image">
                </div>
				  <div class="col col s8 m8 l8">
                    <ul id="profile-dropdown" class="dropdown-content">
                        <li><a href="routers/logout.php"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                        </li>
                    </ul>
                </div>
                <div class="col col s8 m8 l8">
                    <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown"><?php echo $name;?> <i class="mdi-navigation-arrow-drop-down right"></i></a>
                    <p class="user-roal"><?php echo $role;?></p>
                </div>
            </div>
            </li>
            <li class="bold active"><a href="index.php" class="waves-effect waves-light-blue"><i class="mdi-maps-local-restaurant"></i> Products</a>
            </li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-light-blue"><i class="mdi-editor-insert-invitation"></i> Orders</a>
                            <div class="collapsible-body">
                                <ul>
								<li><a href="orders.php">All Orders</a>
                                </li>
								<?php
									$sql = mysqli_query($con, "SELECT DISTINCT status FROM orders
                  
                  
                   WHERE customer_id = $user_id;");
									while($row = mysqli_fetch_array($sql)){
                                    echo '<li><a href="orders.php?status='.$row['status'].'">'.$row['status'].'</a>
                                    </li>';
									}
									?>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-light-blue"><i class="mdi-action-question-answer"></i> Tickets</a>
                            <div class="collapsible-body">
                                <ul>
								<li><a href="tickets.php">All Ticke</a>
                                </li>
								<?php
									$sql = mysqli_query($con, "SELECT DISTINCT status FROM tickets WHERE poster_id = $user_id AND not deleted;");
									while($row = mysqli_fetch_array($sql)){
                                    echo '<li><a href="tickets.php?status='.$row['status'].'">'.$row['status'].'</a>
                                    </li>';
									}
									?>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>					
            <li class="bold"><a href="details.php" class="waves-effect waves-light-blue"><i class="mdi-social-person"></i> Edit Details</a>
            </li>	
            <li class="bold"><a href="routers/logout.php" class="waves-effect waves-light-blue"><i class="mdi-hardware-keyboard-tab"></i> Logout</a></li>			
        </ul>
        <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only  light-blue"><i class="mdi-navigation-menu"></i></a>
        </aside>
      <!-- END LEFT SIDEBAR NAV-->

      <!-- //////////////////////////////////////////////////////////////////////////// -->

      <!-- START CONTENT -->
      <section id="content">

        <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper">
          <div class="container">
            <div class="row">
              <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title">Order</h5>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->


        <!--start container-->
        
		  <form class="formValidate" id="formValidate" method="post"  novalidate="novalidate">
            <div class="row">
              
              <div>
              <div class="col s12 m12 l6">
              <div class="card-panel">
                <h4 class="header2">Place an Order</h4>
                <div class="row">
                  <form class="col s12" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="row">
                    <div class="input-field col s12">
  <input id="category" name="category" type="text" class="validate">
  <label for="category">Category</label>
</div>

                 <div class="row">
                      <div class="input-field col s12">
                        <input id="word_count" name="word_count" type="text" class="validate">
                        <label for="word_count">Word Count</label>
                      </div>
                      <div class="row">
                      <div class="input-field col s12">
                        <input id="title" name="title" type="text" class="validate">
                        <label for="title">Title</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12">
                      <p>File</p>
                        <input id="files" name="files" type="file" class="validate">
                        
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12">
                        <input id="description" name="description" type="text" class="validate">
                        <label for="description">Description</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12">
                        <input id="email" name="email" type="email" class="validate">
                        <label for="email">Email</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12">
                        <input id="modeofpayment" name="modeofpayment" type="text" class="validate">
                        <label for="modeofpayment">Mode of Payment</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12">
                        <button class="btn waves-effect waves-light" type="submit" name="submit">Place Order
                          <i class="mdi-content-send right"></i>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
			
              </div>
              </form>
			 
	
            <div class="divider"></div>
            
          </div>
        </div>
        <!--end container-->

      </section>
      <!-- END CONTENT -->


  </div>
  <!-- END MAIN -->



  <!-- //////////////////////////////////////////////////////////////////////////// -->
 <!-- START FOOTER -->
 
    <!-- END FOOTER -->



    <!-- ================================================
    Scripts
    ================================================ -->
    
    <!-- jQuery Library -->
    <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>    
    <!--angularjs-->
    <script type="text/javascript" src="js/plugins/angular.min.js"></script>
    <!--materialize js-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <!-- data-tables -->
    <script type="text/javascript" src="js/plugins/data-tables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/data-tables/data-tables-script.js"></script>
	
    <script type="text/javascript" src="js/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery-validation/additional-methods.min.js"></script>
    
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.min.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="js/custom-script.js"></script>
   
</body>

</html>

<?php
	}
	else
	{
		if(isset($_SESSION['admin_sid']))
		{
			header("location:admin-page.php");		
		}
		else{
			header("location:login.php");
		}
	}



// Define variables and set them to empty values
$category = $word_count = $title = $description = $email = $modeofpayment = '';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data and sanitize
    $category = sanitizeInput($_POST['category']);
    $word_count =  sanitizeInput($_POST['word_count']);
    $title =  sanitizeInput($_POST['title']);
    $description = sanitizeInput($_POST['description']);
    $email =  sanitizeInput($_POST['email']);
    $modeofpayment =  sanitizeInput($_POST['modeofpayment']);
    
    // Perform any necessary validation on the form data
    // ...

    // Insert the form data into the table
    $query = "INSERT INTO orderz (category, word_count, title, description, email, modeofpayment)
              VALUES ('$category', '$word_count', '$title', '$description', '$email', '$modeofpayment')";

    if (mysqli_query($con, $query)) {
        // Data saved successfully
        echo "Form data saved successfully.";
    } else {
        // Error occurred while saving data
        echo "Error: " . mysqli_error($con);
    }
}

// Function to sanitize form input
function sanitizeInput($input)
{
    global $con; // Assuming you have the database connection available globally

    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    $input = mysqli_real_escape_string($con, $input);

    return $input;
}
?>


