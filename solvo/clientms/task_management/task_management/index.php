<?php include 'includes/db.php';


session_start();
$chck_Active_User = '';
if (isset($_POST['login'])) {
    $uemail = mysqli_real_escape_string($connection, $_POST['User_nm']);
    $pass = mysqli_real_escape_string($connection, $_POST['Paswd']);
    $sql = "select * from emp_login where user_id = '$uemail' and pswd = '$pass'";
    $q = mysqli_query($connection, $sql);
    $row = mysqli_fetch_array($q);
    $count = mysqli_num_rows($q);

    if ($count > 0) {
        $_SESSION['user'] = $row['id'];
        $_SESSION['emp_name'] = $row['emp_name'];
        $_SESSION['emp_pro'] = $row['emp_pro'];
        $_SESSION['User_type'] = $row['user_role'];
        //$_SESSION['User_type']=$row['user_role'];
        //$_SESSION['User_type']=$row['user_role'];


        $chck_Active_User = $row['status'];
        if ($chck_Active_User == '0') {
            echo "<script>alert('your account is currently deactivated. please contact customer care +919553600714');  window.location.href='../login.php';</script>";
        } else {
            echo "<script>alert ('Login Successfull');
       window.location.href='dashboard.php';
       </script>";
        }
    } else { ?>
        <script>
            alert('Failed to login');
            window.location.href = "<?php echo $_SERVER['HTTP_REFERER'] ?>";
        </script>
<?php
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <title> Word Solvo </title>
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="template language" name="keywords">
    <meta content="Tamerlan Soziev" name="author">
    <meta content="Admin dashboard html template" name="description">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="favicon.png" rel="shortcut icon">
    <link href="apple-touch-icon.png" rel="apple-touch-icon">
    <link href="//fast.fonts.net/cssapi/487b73f1-c2d1-43db-8526-db577e4c822b.css" rel="stylesheet" type="text/css">
    <link href="bower_components/select2/dist/css/select2.min.css" rel="stylesheet">
    <link href="bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="bower_components/dropzone/dist/dropzone.css" rel="stylesheet">
    <link href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
    <link href="bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css" rel="stylesheet">
    <link href="bower_components/slick-carousel/slick/slick.css" rel="stylesheet">
    <style>
        .auth-wrapper{
    background-image:url("bgg.png");
    margin:0px;
    height: 100vh;
    width:100vh;
  }
   .row{
    color: red;
    font-size: 40px;
    padding-top: 100px;
    padding-left: 350px;
    width: 100vh;
    font-weight: 700;
    text-align:center;
    color: #023D8A;
    

  }
  .form{
      padding-left:300px;
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
    .button{
    background: #023D8A;
    color: white;
    width:150px;
    margin-left:350px;
    font-size: 20px;
    border-radius: 20px;
    margin-bottom:10px;
   padding-bottom:10px;
    margin-top: 10px;
    box-shadow: 023D8A 0px 25px 50px -12px;

  }

  
    </style>
</head>

<body class="auth-wrapper">
    
    <div class="form">
        <div class="auth-box-w">
            <div class="logo-w"><a href="#">
         <h1 class="row"> Welcome to Word Solvo</h1>  
                <!-- <img style="width: 100%;height: auto;" alt="" src="piit-logo2.png"> -->
            </a></div>
            
            <form action="#" method="post" class="form">
                <!--                <div class="form-group">
                    <label for="">User Type</label>
                    <input class="form-control" name="User_nm" placeholder="Enter your username" type="text">
                    <div class="pre-icon os-icon os-icon-users"></div>
                </div>-->
                <div class="form-group">
                    <label for="" class="center-align">Username</label>
                    <input class="form-control" name="User_nm" placeholder="Enter your username" type="text">
                    <div class="pre-icon os-icon os-icon-user-male-circle"></div>
                </div>
                <div class="form-group">
                    <label for=""class="center-align">Password</label>
                    <input class="form-control" name="Paswd" placeholder="Enter your password" type="password">
                    <div class="pre-icon os-icon os-icon-fingerprint"></div>
                </div>
               
                    <input name="login" type="submit" value="Log me in" class="button">
                    <!--                    <div class="form-check-inline"><label class="form-check-label">
                            <input name="checkPSWDREM" class="form-check-input" type="checkbox">Remember Me</label>
                    </div>-->
              

            </form>
        </div>
    </div>
</body>

</html>