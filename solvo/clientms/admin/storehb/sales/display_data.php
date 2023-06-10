<?php
if (!empty($_POST['from_date']) && !empty($_POST['to_date'])) {
    // Database connection
    $conn = new mysqli('localhost','root','','storehabsiguda');
    if($conn->connect_error){
        echo "$conn->connect_error";
        die("Connection Failed : ". $conn->connect_error);
    } else {
        $from_date = $_POST['from_date'];
        $to_date = $_POST['to_date'];
        
		$stmt = $conn->prepare("SELECT dsr.*, dsrupload.CashSale, dsrupload.CardSale, dsrupload.imageUpload,dsrupload.image, SUM( amount) as total_amount FROM dsr JOIN dsrupload ON dsr.date = dsrupload.date WHERE dsr.date BETWEEN ? AND ? GROUP BY dsr.date"); 
		$stmt->bind_param("ss", $from_date, $to_date);
        
        $stmt->execute();

        $result = $stmt->get_result();
        echo"    ";
        if($result->num_rows > 0) {
            echo "<html><head><style>";
			echo ".table-box {
				display: table;
				width: 100%;
				background-color: #e7f9ff;
				
			  }
			  .table-box th{
				  background-color:#eb2026;
				  color:#e7f9ff;
			  }

			.td{
			
			}
			  
			  .table.no-border tbody td {
				border: 0px;
				background-color: #47abd8;
			  }
			  
			  .cell {
				display: table-cell;
				vertical-align: middle;
			  }
			  
			  .table td,
			  .table th {
				border-color: #f3f1f1;
				line-height:1; 
			  }
			  .thead th {
				position: sticky;
				top: 0;
				background-color: #f7f7f7;
			  }
			  
			  .table th,
			  .table thead th {
				font-weight: 500;
			  }
			  
			  .table-hover tbody tr:hover {
				background: #fdbcbc;
			  }
			  
			  .nowrap {
				white-space: nowrap;
			  }
			  
			  .lite-padding td {
				padding: 3px;
			  }
			  
			  
			  .v-middle td,
			  .v-middle th {
				vertical-align: middle;
				
			  }
			  .hidden {
				display: none;
			}
			

			  
			  .table-responsive {
				display: block;
				width: 100%;
				overflow-x: auto;
				-ms-overflow-style: -ms-autohiding-scrollbar;
			  }
			  
			  ";
			echo "</style>";
			echo "<script>";
			echo "
			function toggleImage(button) {
				var img = button.nextElementSibling;
				if (img.classList.contains('hidden')) {
					img.classList.remove('hidden');
					button.textContent = 'Hide Image';
				} else {
					img.classList.add('hidden');
					button.textContent = 'View Image';
				}
			}";
			echo "</script></head><body>";
	
			echo "<h1> Daily Sales Report:- Habsiguda</h1>";
			echo "<table class='table-border display nowrap table-box table-hover  table-striped table-bordered' border='0'>";
echo "  <thead>";
echo "    <tr>";
echo "      <th colspan='4' style='color:blue;'>Sales</th>";
echo "      <th colspan='3' style='color:blue;'>Sales Return and Voids</th>";
echo "    </tr>";
echo "    <tr>";
echo "      <th>Date</th>";
echo "      <th>Total Bill</th>";
echo "      <th>Quantity</th>";
echo "      <th>Amount</th>";
echo "      <th>Quantity</th>";
echo "      <th>Amount</th>";
echo "      <th>Cash Sale</th>";
echo "      <th>Card Sale</th>";
echo "      <th>UPI</th>";
echo "      <th>Cash Slip Image</th>";
echo "      <th>Card Slip Image</th>";
echo "    </tr>";
echo "  </thead>";
echo "  <tbody>";
// Your data rows go here
echo "  </tbody>";
echo "</table>";



            echo "";
			$total_amount = 0; // variable to store total amount

				while($row = $result->fetch_assoc()) {
					echo "<tr>";
					$total_amount += $row["amount"];

					echo "<td>" . $row["date"] . "</td>";
					echo "<td>" . $row["total_bill"] . "</td>";
					echo "<td>" . $row["qty"] . "</td>";
					echo "<td>" . $row["amount"] . "</td>";
					echo "<td>" . $row["bill"] . "</td>";
					echo "<td>" . $row["quant"] . "</td>";
					echo "<td>" . $row["amounts"] . "</td>";
					echo "<td>" . $row["CashSale"] . "</td>";
					echo "<td>" . $row["CardSale"] . "</td>";
					echo "<td>
    <button onclick='toggleImage(this)'>View Image</button>
    <img src='../../../storehabsiguda/sales/" . $row["imageUpload"] . "' alt='Cash Slip Image' width='100' class='hidden'>
    <br>
    <a href='../../../storehabsiguda/sales/" . $row["imageUpload"] . "' download>Download Image</a>
</td>";
echo "<td>
    <button onclick='toggleImage(this)'>View Image</button>
    <img src='../../../storehabsiguda/sales/" . $row["image"] . "' alt='Cash Slip Image' width='100' class='hidden'>
    <br>
    <a href='../../../storehabsiguda/sales/" . $row["image"] . "' download>Download Image</a>
</td>";

	  
echo "</tr>";
				
            }
			echo "<tr><td colspan='3'>Total Amount:</td><td>" . $total_amount . "</td><td colspan='6'></td></tr>";

            echo "</table>";
			echo "<td><a href='export_csv.php'><button>Export to CSV</button></a></td>";
			echo "<td> <button onClick='window.print()''>Print this page</button></td>";
			echo "<td><a href='display.php'><button>Go Back to Dashboard</button></a></td>";
		  
        } else {
            echo "No data found for the selected date range";
        }
        $stmt->close();
        $conn->close();
    }
}
?>
