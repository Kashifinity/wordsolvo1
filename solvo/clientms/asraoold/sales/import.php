<?php
use SimpleExcel\SimpleExcel;


if(isset($_POST['import'])){
    // Specify the directory where the CSV file should be moved
    $upload_dir = 'upload/';

    if(move_uploaded_file($_FILES['excel_file']['tmp_name'], $upload_dir . $_FILES['excel_file']['name'])){
        require_once('SimpleExcel/SimpleExcel.php'); 
        $excel = new SimpleExcel('csv');                  
        $excel->parser->loadFile($upload_dir . $_FILES['excel_file']['name']);           
        $rows = $excel->parser->getField(); 

        $db = mysqli_connect('localhost','root','','asraoold');
        mysqli_set_charset($db, 'utf8mb4'); // Set charset to handle special characters

        foreach ($rows as $row) {
            $date = $row[0];
            if (!empty($date) && $date != '0000-00-00') { // Check if the date value is not empty or null
                $total_bill = (float) str_replace(',', '', $row[1]); // Remove comma from total_bill value and cast to float
                $qty = (int) $row[2];
                $amount = (float) str_replace(',', '', $row[3]); // Remove comma from amount value and cast to float
                $bill = (int) $row[4];
                $quant = (int) $row[5];
                $amounts = (float) str_replace(',', '', $row[6]); // Remove comma from amounts value and cast to float

                $query = "INSERT INTO dsr (date,total_bill,qty,amount,bill,quant,amounts,qweer) ";
                $query .= "VALUES ('$date','$total_bill','$qty','$amount','$bill','$quant','$amounts',0)";
                mysqli_query($db,$query);
            }
        }

        mysqli_close($db); // Close database connection
        $to = "shrikaanthshyam@gmail.com";
        $subject = "Data uploaded to database";
        $message = "The data has been uploaded to the database successfully.";

        // Send email
        mail($to, $subject, $message);


        echo "<script>window.location.href='index.php';</script>";
    }
}
?>
