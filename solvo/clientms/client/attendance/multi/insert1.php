<?php

//insert.php


// $host="localhost";
// $dbusername="root";
// $dbpassword="";
// $dbname="sachive_data";

  $id = $_REQUEST['id'];
 $val = $_REQUEST['val'];
$originalDate = date('Y-m-d');
 $newDate = date("d-m-Y", strtotime($originalDate));
 

$query="insert into attedence_tbl (emp_id,attedence ,date1) values('$id','$val','$newDate')";
   
   require'conn1.php';
   mysqli_query($con,$query);
   $n=mysqli_affected_rows($con);
   if($n>0){
    echo 'insert sucess';
}




?>