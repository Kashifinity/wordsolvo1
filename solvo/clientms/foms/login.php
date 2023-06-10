<?php  
session_start(); 
if(isset($_SESSION['admin_sid']) || isset($_SESSION['customer_sid']))
{
	header("location:index.php");
}
else{
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <title>Login</title>

  <!-- Favicons-->
  <link rel="icon" href="images/favicon/favicon_32x32.png" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
  <!-- For Windows Phone -->


  <!-- CORE CSS-->
  
 
  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  <style>
  *{
    
  }
  .row{
    color: red;
    font-size: 40px;
    padding-top: 100px;
    padding-left: 0px;
    width: 100vh;
    font-weight: 700;
    text-align:center;
    color: #023D8A;
    

  }
  .light-blue{
    background-image:url("./images/bgg.png");
    margin:0px;
    height: 100vh;
    width:100vh;
  }
  .image{
    height: 100vh;
    background-color: #023D8A;
    margin: 0px;
  }
  .center{
    text-size: 50px;
  }
  .input-field{
    text-size: 50px;

  }
  .button{
    background: #023D8A;
    color: white;
    padding: 7px 50px;
    font-size: 20px;
    border-radius: 20px;
    margin-bottom:10px;
    margin-left:360px;
    margin-top: 10px;
    box-shadow: 023D8A 0px 25px 50px -12px;

  }

  .button:hover{
    background: blue;
    color: white;
    padding: 7px 50px;
    font-size: 20px;
    border-radius: 20px;
    margin-bottom:10px;
    margin-left:360px;
    margin-top: 10px;
    

  }
  
 
  .login-form{
    position:relative;
  
    padding-left: 700px;
    }
  input{
      padding:10px;
      height: 30px;
      width: 550px;
      margin-bottom: 20px;
      margin-top:5px;
      margin-left: 150px;
      border-radius: 20px;
      font-size:20px;
    }
  .center-align{
      text-align: center;
      padding-left: 160px;
      font-size:20px;
    }
  .buttonn{
      color: #023D8A;
     
      text-align: center;
      width: 94vh;
    }
  
  
  </style>
</head>

<body class=" light-blue">

  <!-- Start Page Loading -->
  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->



  <div id="login-page" class="">
    <div class=" card-panel"></div>
      <form method="post" action="routers/router.php" class="login-form" id="form">
        <div class="row">
          <div class="input-field ">
            <p class="center">Welcome to Word Solvo</p>
          </div>
        </div>
        <div class="margin">
          <div class="input-field ">
            <i class=""></i>
            <label for="username" class="center-align">Username:</label>
            <input name="username" id="username" type="text">
            
          </div>
        </div>
        <div class="margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <label for="password" class="center-align">Password:</label>
            <input name="password" id="password" type="password">
            
          </div>
        </div>
        <div class="">
			<a href="javascript:void(0);" onclick="document.getElementById('form').submit();" class="button">Login</a>
          </div>
          <div class="buttonn">
          <div class="input-field col s6 m6 l6">
            <p class="margin medium-small"><a href="../task_management/task_management/index.php">Manager Login</a></p>
            <p class="margin medium-small"><a href="../task_management/task_management/index.php">Writer Login</a></p>
          </div>         
        </div>
          <div class="buttonn">
			<a href="../index.php" class="">Back to Home</a>
          </div>
		  		
        </div>


      </form>
    </div>
  </div>



  <!-- ================================================
    Scripts
    ================================================ -->

  <!-- jQuery Library -->
  <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>
  <!--materialize js-->
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <!--scrollbar-->
  <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

      <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.min.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="js/custom-script.js"></script>

</body>
</html>
<?php
}
?>