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

		// Get the latest closing balance from the database
		$sql = "SELECT closing_balance FROM expenditure ORDER BY id DESC LIMIT 1";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$opening_balance = $row["closing_balance"];
		} else {
			$opening_balance = 0;
		}

		if(isset($_POST['submit'])){
			$date = $_POST['date'];
			$expenditure = $_POST['expenditure'];
			$particulars = $_POST['particulars'];
			$image = $_FILES['image']['name'];

			// Calculate closing balance
			$closing_balance = $opening_balance - $expenditure;

			// Display closing balance
			echo "<p>Closing Balance: $closing_balance</p>";

			// Calculate balance for each day
			// Convert date string to timestamp
			$timestamp = strtotime($date);
			// Format date as YYYY-MM-DD
			$formatted_date = date('Y-m-d', $timestamp);

			// Display balance for each day
			$balance = $opening_balance;
			while($formatted_date <= date('Y-m-d')){
				echo "<p>$formatted_date Balance: $balance</p>";
				$balance -= $expenditure;
				$formatted_date = date('Y-m-d', strtotime("+1 day", strtotime($formatted_date)));
			}

			// Save data to database
			$sql = "INSERT INTO expenditure (date, expenditure, particulars, opening_balance, closing_balance, image) VALUES ('$date', '$expenditure', '$particulars', '$opening_balance', '$closing_balance', '$image')";
			if ($conn->query($sql) === TRUE) {
				echo "<p>Record added successfully</p>";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}

			echo "Thank you!! Data submitted successfully";
            echo "<a href='index.php'><button>Go Back</button></a>";
       
		}
		// Close database connection
		$conn->close();
	?>    