<?php
// Database connection
$conn = new mysqli('localhost','root','','storehabsiguda');
if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ". $conn->connect_error);
} else {
    // Fetch data from database
    $query = "SELECT * from image";
    $result = $conn->query($query);

    // Create CSV file
    $location = "habsigudagrooming"; // replace with your desired location
    $date = date('Y-m-d'); // gets the current date in the format YYYY-MM-DD
    $filename = $location . '_' . $date . '.csv';
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename='.$filename);
   
    // Write CSV headers
    $fp = fopen('php://output', 'w');
    fputcsv($fp, array('ID', 'Date', 'Location', 'Image', ));

    // Write CSV rows
    while($row = $result->fetch_assoc()) {
        $csv_row = array(
            $row["id"],
            $row["date"],
            $row["location"],
            $row["image"],
             );
        fputcsv($fp, $csv_row);
    }

    fclose($fp);
    $conn->close();
}
?>
