
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
        
		$stmt = $conn->prepare("SELECT * from expenditure WHERE date BETWEEN ? AND ? "); 
		$stmt->bind_param("ss", $from_date, $to_date);
        
        $stmt->execute();

        $result = $stmt->get_result();
        echo"    ";
        if($result->num_rows > 0) {
            echo "<html><head><style>";
			echo ".table-box {
					display: table;
					width: 100%;
				}
				
				.table.no-border tbody td {
					border: 0px;
				}
				
				.cell {
					display: table-cell;
					vertical-align: middle;
				}
				
				.table td,
				.table th {
					border-color: #f3f1f1;
				}
				
				.table th,
				.table thead th {
					font-weight: 500;
				}
				
				.table-hover tbody tr:hover {
					background: #f2f4f8;
				}
				
				.nowrap {
					white-space: nowrap;
				}
				
				.lite-padding td {
					padding: 5px;
				}
				
				.v-middle td,
				.v-middle th {
					vertical-align: middle;
				}
				
				.table-responsive {
					display: block;
					width: 100%;
					overflow-x: auto;
					-ms-overflow-style: -ms-autohiding-scrollbar;
				}";
			echo "</style></head><body>";
	
			echo "<h1> Petty Cash</h1>";
			echo "<table>";
        echo"    <h5 align='center' style='color:blue'></h5>
          <table class='table-border display nowrap table-box table-hover table-striped table-bordered' border='3'> <thead> <tr> <th></th> 
          <tr><th>Date</th><th>Expenditure</th><th>Particulars</th><th>Closing Balance</th><th>Images</th></tr>       </tr>
       </thead>
        <tbody>";


            echo "";
			$total_amount = 0; // variable to store total amount

            while($row = $result->fetch_assoc()) {
                echo "<tr>";
				$total_amount += $row["expenditure"];

                echo "<td>" . $row["date"] . "</td>";
                echo "<td>" . $row["expenditure"] . "</td>";
				echo "<td>" . $row["particulars"] . "</td>";
				echo "<td>" . $row["closing_balance"] . "</td>";
				
				
				echo "<td><img src='upload/" . $row["image"] . "' width='100'></td>";
echo "</tr>";
				
            }
	
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
