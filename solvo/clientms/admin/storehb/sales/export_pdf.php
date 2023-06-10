<?php
// Database connection
$conn = new mysqli('localhost','root','','store');
if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ". $conn->connect_error);
} else {
    
    $stmt = $conn->prepare("SELECT dsr.*, dsrupload.CashSale, dsrupload.CardSale,dsrupload.imageUpload FROM dsr JOIN dsrupload ON dsr.date = dsrupload.date");

    $stmt->execute();

    $result = $stmt->get_result();
    if($result->num_rows > 0) {
        require_once __DIR__ . '../vendor/autoload.php';
        $mpdf = new \Mpdf\Mpdf();
        $html = "<h5 align='center' style='color:blue'>Sales Report</h5>
                <table class='table' border='1'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Sale Date</th>
                            <th>Quantity</th>
                            <th>Bill No</th>
                            <th>Amount</th>
                            <th>Bill No</th>
                            <th>Quant</th>
                            <th>Amounts</th>
                            <th>Cash Sale</th>
                            <th>Card Sale</th>
                        </tr>
                    </thead>
                    <tbody>";

        while($row = $result->fetch_assoc()) {
            $html .= "<tr>";
            $html .= "<td>" . $row["id"] . "</td>";
            $html .= "<td>" . $row["date"] . "</td>";
            $html .= "<td>" . $row["qty"] . "</td>";
            $html .= "<td>" . $row["bill"] . "</td>";
            $html .= "<td>" . $row["amount"] . "</td>";
            $html .= "<td>" . $row["quant"] . "</td>";
            $html .= "<td>" . $row["amounts"] . "</td>";
            $html .= "<td>" . $row["CashSale"] . "</td>";
            $html .= "<td>" . $row["CardSale"] . "</td>";
            $html .= "</tr>";
        }

        $html .= "</tbody></table>";
        $mpdf->WriteHTML($html);
        $mpdf->Output('report.pdf', 'D');
    } else {
        echo "No data found in the database";
    }

    $stmt->close();
    $conn->close();
}
?>
