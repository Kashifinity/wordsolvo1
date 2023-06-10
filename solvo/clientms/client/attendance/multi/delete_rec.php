<?php

$id = $_REQUEST["id"];

require 'conn1.php';

$query = "delete from emp_tbl  where id='$id'";

mysqli_query($con,$query);

$n = mysqli_affected_rows($con);

if($n>0){
	header('Location: http://localhost/attendance/index.php');
}

mysqli_close($con);
?>