<?php
// Database connection
$conn = new mysqli('localhost','root','','storehabsiguda');
if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ". $conn->connect_error);
} else {
    // Fetch data from database
    $query = "SELECT invoice.*, invoiceupload.value,invoiceupload.imageUpload FROM invoice JOIN invoiceupload ";
    $result = $conn->query($query);

    // Create CSV file
    $location = "habsigudapi"; // replace with your desired location
    $date = date('Y-m-d'); // gets the current date in the format YYYY-MM-DD
    $filename = $location . '_' . $date . '.csv';
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename='.$filename);
    
    // Write CSV headers
    $fp = fopen('php://output', 'w');
    fputcsv($fp, array('Sale Date', 'Bill NO', 'Reason', 'Doc Number', 'DOC Date', 'DOC Quantity', 'Net Value','Value', 'Image File'));

    // Write CSV rows
    while($row = $result->fetch_assoc()) {
        $csv_row = array(
            $row["date"],
            $row["billNo"],
            $row["reason"],
            $row["dcno"],
            $row["dcdate"],
            $row["dcqty"],
            $row["netValue"],
            $row["value"],
            $row["imageUpload"]
        );
        fputcsv($fp, $csv_row);
    }

    fclose($fp);
    $conn->close();
}
?>
