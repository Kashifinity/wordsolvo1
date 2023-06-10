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
		
		$stmt = $conn->prepare("SELECT invoice.*, invoiceupload.value,invoiceupload.imageUpload FROM invoice JOIN invoiceupload ON invoice.date = invoiceupload.date WHERE invoice.date BETWEEN ? AND ?"); 
		$stmt->bind_param("ss", $from_date, $to_date);
		
		$stmt->execute();
		$result = $stmt->get_result();
		if($result->num_rows > 0) {
			
			echo "<html><head><style>";
			echo "<h1> Purchase Invoice:- Habsiguda</h1>";
		
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
	
			echo "<table>";
		echo"	<h5 align='center' style='color:blue'></h5>
          <table class='display nowrap table-box table-hover table-striped table-bordered'cellspacing='0' border='1'> <thead> <tr> 
		  <tr><th> Date</th><th>Bill Number</th><th>Reason</th><th>DoC Number</th><th>DOC Date</th><th>DOC Quantity</th><th>Netvalue</th><th>Value</th><th>Image File</th></tr> </tr>
	   </thead>
		<tbody>";

			echo "";
			while($row = $result->fetch_assoc()) {
				echo "<tr>";
				echo "<td>" . $row["date"] . "</td>";
				echo "<td>" . $row["billNo"] . "</td>";
				echo "<td>" . $row["reason"] . "</td>";
				echo "<td>" . $row["dcno"] . "</td>";
				echo "<td>" . $row["dcdate"] . "</td>";
				echo "<td>" . $row["dcqty"] . "</td>";
				echo "<td>" . $row["netValue"] . "</td>";
				echo "<td>" . $row["value"] . "</td>";
				echo "<td>
				<img src='../../../storehabsiguda/invoice/" . $row["imageUpload"] . "' alt='Cash Slip Image' width='100'>
				<br>
				<a href='../../../storehabsiguda/invoice/" . $row["imageUpload"] . "' download>Download</a>
			   </td>";
	  
				echo "</tr>";
			}
			echo "</table>";
			echo "<td><a href='export_csv.php'><button class='btn-primary'>Export to CSV</button></a></td>";
		    echo "<td> <button onClick='window.print()''>Print this page</button></td>";
			echo "<td><a href='../dashboard.php'><button>Go Back to Dashboard</button></a></td>";
		  
		} else {
			echo "No data found for the selected date range";
		}
		$stmt->close();
		$conn->close();
	}
}

?>
