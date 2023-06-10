<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsuid']==0)) {
  header('location:logout.php');
  } 
     ?>


<!DOCTYPE html>
<html>
<head>
	<title>Image Upload</title>
</head>
<body>
	<form method="POST" enctype="multipart/form-data" action="upload.php">
		<label for="image">Select an image:</label>
		<input type="file" id="image" name="image"><br>

		<input type="submit" value="Upload">
		
	</form>
</body>
</html>
