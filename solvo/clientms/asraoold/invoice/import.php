<?php
use SimpleExcel\SimpleExcel;

if(isset($_POST['import'])){

if(move_uploaded_file($_FILES['excel_file']['tmp_name'],$_FILES['excel_file']['name'])){
    require_once('SimpleExcel/SimpleExcel.php'); 
    
    $excel = new SimpleExcel('csv');                  
    
    $excel->parser->loadFile($_FILES['excel_file']['name']);           
    
    $foo = $excel->parser->getField(); 

    $count = 1;
    $db = mysqli_connect('localhost','root','','asraoold');

    while(count($foo)>$count){
        $date = $foo[$count][0];
        $billNo = $foo[$count][1];
        $reason = $foo[$count][2];
        $dcno = $foo[$count][3];
        $dcdate = $foo[$count][4];
        $dcqty = $foo[$count][5];
        $netValue = $foo[$count][6];

        $query = "INSERT INTO invoice (date,billNo,reason,dcno,dcdate,dcqty,netValue) ";
        $query.="VALUES ('$date','$billNo','$reason','$dcno','$dcdate','$dcqty','$netValue')";
        mysqli_query($db,$query);
        $count++;
    }

    echo "<script>window.location.href='index.php';</script>";
               
    
    
               
    
    
}
   
    
    
}
?>