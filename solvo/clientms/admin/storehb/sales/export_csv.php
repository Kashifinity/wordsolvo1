<?php
// Database connection
$conn = new mysqli('localhost','root','','storehabsiguda');
if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ". $conn->connect_error);
} else {
    // Fetch data from database
    $query = "SELECT dsr.*, dsrupload.CashSale, dsrupload.CardSale,imageUpload FROM dsr JOIN dsrupload ON dsr.date = dsrupload.date";
    $result = $conn->query($query);

    // Create CSV file
    $location = "habsigudadsr"; // replace with your desired location
$date = date('Y-m-d'); // gets the current date in the format YYYY-MM-DD
$filename = $location . '_' . $date . '.csv';
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename='.$filename);

    // Write CSV headers
    $fp = fopen('php://output', 'w');
    fputcsv($fp, array('Sale Date', 'Quantity', 'Bill No', 'Amount', 'Total Bill', 'Cash Sale', 'Card Sale', 'UPI', 'Image File'));

    // Write CSV rows
    while($row = $result->fetch_assoc()) {
        $csv_row = array(
            $row["date"],
            $row["qty"],
            $row["bill"],
            $row["amount"],
            $row["total_bill"],
            $row["CashSale"],
            $row["CardSale"],
            $row["quant"],
            $row["imageUpload"]
        );
        fputcsv($fp, $csv_row);
    }

    fclose($fp);
    $conn->close();
}
?>
