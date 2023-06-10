<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'testt');
if ($conn->connect_error) {
    echo "$conn->connect_error";
    die("Connection Failed : " . $conn->connect_error);
}

// SQL statement to retrieve data from the database
$sql = "SELECT * FROM pettycash";

// Prepare the SQL statement
$stmt = $conn->prepare($sql);

// Execute the statement
$stmt->execute();

// Store the result set
$result = $stmt->get_result();

// Display the data in a table
echo "<table>";
echo "<tr><th>Petty Date</th><th>Particular</th><th>Opening Balance</th><th>Closing Balance</th><th>Expenditure</th><th>Image</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["PettyDate"] . "</td><td>" . $row["Particular"] . "</td><td>" . $row["OBalance"] . "</td><td>" . $row["ClosingBalance"] . "</td><td>" . $row["Expenditure"] . "</td><td><img src='" . $row["imageUpload"] . "' height='100' width='100'></td></tr>";
}
echo "</table>";

// Close the statement and connection
$stmt->close();
$conn->close();
?>
