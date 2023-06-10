<?php
session_start();
$con = mysqli_connect("localhost","root","","store");

if(isset($_POST['save_multiple_checkbox']))
{
    $SaleDate = $_POST['SaleDate'];
    $brands = $_POST['brands'];

    foreach($brands as $item)
    {
        $query = "INSERT INTO mis (name, SaleDate) VALUES ('$item', '".date('Y-m-d', strtotime($SaleDate))."')";
        $query_run = mysqli_query($con, $query);
    }

    $stmt = $con->prepare("INSERT INTO mis (SaleDate) values(?)");
    $stmt->bind_param("s", date('Y-m-d', strtotime($SaleDate)));
    $execval = $stmt->execute();

    if($query_run)
    {
        $_SESSION['status'] = "Inserted Successfully";
        header("Location: dashboard.php");
    }
    else
    {
        $_SESSION['status'] = "Data Not Inserted";
        header("Location: dashboard.php");
    }
}
?>
