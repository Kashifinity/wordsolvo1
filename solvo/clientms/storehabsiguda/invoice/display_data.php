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
		
		$stmt = $conn->prepare("SELECT * FROM invoice WHERE date BETWEEN ? AND ?");
		$stmt->bind_param("ss", $from_date, $to_date);
		
		$stmt->execute();
		$result = $stmt->get_result();
		if($result->num_rows > 0) {
			echo "<table>";
		echo"	<h5 align='center' style='color:blue'></h5>
          <table class='table' border='1'> <thead> <tr> <th>#</th> 
		  <tr><th>Sale Date</th><th>Quantity</th><th>Bill No</th><th>Cash Sale</th><th>Card Sale</th><th>UPI</th><th>PDF File</th><th>Image File</th></tr>       </tr>
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
				
				echo "</tr>";
			}
			echo "</table>";
		} else {
			echo "No data found for the selected date range";
		}
		$stmt->close();
		$conn->close();
	}
}

?>
