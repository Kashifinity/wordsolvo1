<!DOCTYPE html>
<html>
<head>
	<title>Petty Cash - View Data</title>
</head>
<body>
	<h1>Petty Cash - View Data</h1>
	<?php
		// Connect to database
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "storehabsiguda";

		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		// Retrieve data from database
		$sql = "SELECT * FROM expenditure ORDER BY date DESC";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// Output data of each row
			while($row = $result->fetch_assoc()) {
				echo "<p>Date: " . $row["date"] . "</p>";
				echo "<p>Expenditure: " . $row["expenditure"] . "</p>";
				echo "<p>Particulars: " . $row["particulars"] . "</p>";
				echo "<p>Opening Balance: " . $row["opening_balance"] . "</p>";
				echo "<p>Closing Balance: " . $row["closing_balance"] . "</p>";
				echo "<img src='" . $row["image"] . "' alt='Image' width='200'><br><br>";
			}
		} else {
			echo "0 results";
		}

		// Close database connection
		$conn->close();
	?>
</body>
</html>
