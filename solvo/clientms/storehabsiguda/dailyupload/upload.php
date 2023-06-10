<?php
// Connect to the database
$dsn = "mysql:host=localhost;dbname=storehabsiguda;charset=utf8mb4";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
try {
    $pdo = new PDO($dsn, "root", "", $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// Get the data from the form
$date = $_POST['date'] ?? '';
$location = $_POST['location'] ?? '';

// Upload the image to the server and get the file path
$image_path = '';
if (isset($_FILES["image"])) {
    $image_data = file_get_contents($_FILES["image"]["tmp_name"]);
    $image_path = "data:image/jpeg;base64," . base64_encode($image_data);
}

// Insert the data into the database
$sql = "INSERT INTO image (date, location, image_path) VALUES (NOW(), :location, :image_path)";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':location', $location, PDO::PARAM_STR);
$stmt->bindValue(':image_path', $image_path, PDO::PARAM_STR);
$stmt->execute();

// Check for errors and display the appropriate message
if ($stmt->rowCount() > 0) {
    echo "Image uploaded successfully.";
} else {
    echo "Error: Image upload failed.";
}

echo "Thank you!! Data submitted successfully";
echo "<a href='index.php'><button>Go Back</button></a>";

// Close the database connection
unset($pdo);
?>
