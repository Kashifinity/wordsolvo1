<?php
use SimpleExcel\SimpleExcel;

if(isset($_POST['import'])){
    // Specify the directory where the CSV file should be moved
    $upload_dir = 'upload/';

    if(move_uploaded_file($_FILES['excel_file']['tmp_name'], $upload_dir . $_FILES['excel_file']['name'])){
        require_once('SimpleExcel/SimpleExcel.php'); 
        $excel = new SimpleExcel('csv');                  
        $excel->parser->loadFile($upload_dir . $_FILES['excel_file']['name']);           
        $foo = $excel->parser->getField(); 

        $count = 0;
        $db = mysqli_connect('localhost','root','','store');

        if (count($foo) > 0) { // Check if the $foo array has at least one element
            $date = $foo[$count][0];
            if (!empty($date) && $date != '0000-00-00') { // Check if the date value is not empty or null
                $total_bill = $foo[$count][1];
                $qty = $foo[$count][2];
                $amount = $foo[$count][3];
                $bill = $foo[$count][4];
                $quant = $foo[$count][5];
                $amounts = $foo[$count][6];

                $query = "INSERT INTO dsr (date,total_bill,qty,amount,bill,quant,amounts) ";
                $query .= "VALUES ('$date','$total_bill','$qty','$amount','$bill','$quant','$amounts')";
                mysqli_query($db,$query);
            }
        }

        echo "<script>window.location.href='index.php';</script>";
    }
}

?>
