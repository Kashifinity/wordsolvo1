<?php
// Define the upload directory where the image will be stored
$uploadDir = 'uploads/';

// Connect to the database (replace the placeholders with your own database credentials)
$dbHost = 'localhost';
$dbName = 'store';
$dbUser = 'root';
$dbPass = '';
$db = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPass);

// Check if the form has been submitted and the file has been uploaded successfully
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    // Get the file name and path
    $fileName = basename($_FILES['image']['name']);
    $filePath = $uploadDir . $fileName;

    // Move the uploaded file to the upload directory
    move_uploaded_file($_FILES['image']['tmp_name'], $filePath);

    // Get the current date and time
    $dateTime = date('Y-m-d H:i:s');

    // Get the location of the image using the Exif data
    $exif = exif_read_data($filePath);
    $location = '';
    if (!empty($exif['GPSLatitude']) && !empty($exif['GPSLongitude'])) {
        $latitude = convertToDegrees($exif['GPSLatitude']);
        $longitude = convertToDegrees($exif['GPSLongitude']);
        $location = $latitude . ', ' . $longitude;
    }

    // Insert the image and metadata into the database
    $stmt = $db->prepare("INSERT INTO images (file_name, upload_date, location) VALUES (:file_name, :upload_date, :location)");
    $stmt->bindParam(':file_name', $fileName);
    $stmt->bindParam(':upload_date', $dateTime);
    $stmt->bindParam(':location', $location);
    $stmt->execute();

    // Redirect the user to a new page to display the uploaded image and its metadata
    header("Location: index.php?image=$fileName&time=$dateTime");
    exit();
}

// Function to convert GPS coordinates to degrees
function convertToDegrees($coordinate) {
    $degrees = count($coordinate) > 0 ? $coordinate[0] : 0;
    $minutes = count($coordinate) > 1 ? $coordinate[1] : 0;
    $seconds = count($coordinate) > 2 ? $coordinate[2] : 0;

    // Calculate the decimal degree value
    $decimal = $degrees + ($minutes / 60) + ($seconds / 3600);

    // Check if the coordinate is in the southern or western hemisphere
    if (in_array($coordinate, array('S', 'W'))) {
        $decimal *= -1;
    }

    return $decimal;
}
