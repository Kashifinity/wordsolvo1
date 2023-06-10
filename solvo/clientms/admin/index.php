<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login'])) 
  {
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $sql ="SELECT ID FROM tbladmin WHERE UserName=:username and Password=:password";
    $query=$dbh->prepare($sql);
    $query-> bindParam(':username', $username, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
{
foreach ($results as $result) {
$_SESSION['clientmsaid']=$result->ID;
}
$_SESSION['login']=$_POST['username'];
echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
} else{
echo "<script>alert('Invalid Details');</script>";
}
}

?>
<!DOCTYPE HTML>
<html>
<head>
	<title>World Solvo</title>

	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<!-- Custom CSS -->
	
	<!-- Graph CSS -->
	<link href="css/font-awesome.css" rel="stylesheet"> 
	<!-- jQuery -->
	<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
	<!-- lined-icons -->
	<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
	<!-- //lined-icons -->
	<script src="js/jquery-1.10.2.min.js"></script>
	<style>
	.error_page{
		background-image:url("images/bg.jpg");

		height: 100vh;
		width:100vh;
		margin:0px;
	}

	@media only screen and (max-width: 600px){
		.error_page{
			background-color: white;

		height: 100vh;
		width:100vh;
		margin:0px;
	}
	.inner-tittle{
		font-weight: 900;
		text-align: center;
		font-size: 48px;
		padding-top:200px;

	}
	}
	.error-top{
		
	display: flex;
	justify-content: flex-end;
width:400px;
margin-left: 1000px;


	}

	.inner-tittle{
		font-weight: 900;
		text-align: center;
		font-size: 48px;
		padding-top:200px;
	}
	.text{
		width: 600px;
		height: 50px;
		border: none;
		background-color: #eff0f2;
		margin-bottom:20px;
		padding: 10px;
		border-radius:10px;
	}
	.submit{
		width:150px;
		height: 40px;
		border:none;
		background-color: #023D8A;
		color: white;
		font-size:20px;
		border-radius: 8px;
		margin-left:230px;
	}
	.new{
		text-align:center;
		margin:20px;
	}
	.google{
		width:20px;
		height:20px;
	}
	.gsign{
		background-color:#ffff;
		border: 0.5px solid black;
		padding: 10px;
		width: 190px;
		margin-left:210px;
		border-radius:8px;
	}
	h4{
		margin-top: 40px;
	}
	#id{
		padding-top:100px;
	}
	
	
		
	</style>
</head> 
<body>
	<div class="error_page">

		<div class="error-top">
			<h2 class="inner-tittle page"></h2>
			<div class="login">
				
				<div class="buttons login">
					<h3 class="inner-tittle t-inner" style="color: #2a2185">Welcome</h3>
				</div>
				<form id="login" method="post" name="login"> 
				<label><h5>Email or Phone Number</h5></label>
					<input type="text" class="text" value="Your Email or Phone Number" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'E-mail address';}" name="username" required="true">
					<label><h5>Password</h5></label>
					<input type="password" class="text"value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" name="password" required="true">
					<div class=""><input type="submit" class="submit" onclick="myFunction()" value="Login" name="login" ></div>
					<div class="clearfix"></div>

					<div class="new">
						<p><a href="forgot-password.php">Forgot Password?</a></p><br />
						<p><a href="../admin/index.php">Back Home!!</a></p>

						<h4>OR</h4>

						<div class="clearfix"></div>
					</div>
					<div class="gsign"><svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="google">
<rect width="50" height="50" fill="url(#pattern0)"/>
<defs>
<pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
<use xlink:href="#image0_1_158" transform="scale(0.02)"/>
</pattern>
<image id="image0_1_158" width="50" height="50" xlink:href="data:image/png;base64,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"/>
</defs>
</svg>
Sign up with Google</div>
				</form>
			</div>


		</div>


		<!--//login-top-->
	</div>

	<!--//login-->
	<!--footer section start-->
	<div class="footer">
		
		<?php include_once('includes/footer.php');?>
	</div>
	<!--footer section end-->
	<!--/404-->
	<!--js -->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>