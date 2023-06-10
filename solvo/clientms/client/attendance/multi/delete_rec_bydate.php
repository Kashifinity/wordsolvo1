<?php



require 'conn1.php';

 $d = date('d-m-Y');

$query = "delete from attedence_tbl   where date1 ='$d'";

mysqli_query($con,$query);

$n = mysqli_affected_rows($con);

if($n>0){
	header('Location:  http://localhost/attendance/index.php');
}

mysqli_close($con);
?> 