<?php
if(!empty($_POST)) {
    $date = $_POST['date'];
    
    $CashSale = $_POST['CashSale'];
    $CardSale = $_POST['CardSale'];
    $upi = $_POST['upi'];

    // Image file uploading
    $image = $_FILES['imageUpload'];
    $image_name = $image['name'];
    $image_tmp_name = $image['tmp_name'];
    $image_size = $image['size'];
    $image_error = $image['error'];

    if($image_error === 0){
        $image_destination = 'upload/' . $image_name;
        move_uploaded_file($image_tmp_name, $image_destination);
    }

    // Database connection
    $conn = new mysqli('localhost','root','','store');
    if($conn->connect_error){
        echo "$conn->connect_error";
        die("Connection Failed : ". $conn->connect_error);
    } else {
        $stmt = $conn->prepare("insert into dsrupload(date,CashSale, CardSale, upi,  imageUpload) values(?, ?, ?, ?,  ?)");
        $stmt->bind_param("sddds", date('Y-m-d', strtotime($date)), $CashSale, $CardSale, $upi, $image_destination);
        $execval = $stmt->execute();

        if($execval === false) {
            echo "Error: " . $conn->error;
        } else {
            echo "Thnak you!!Data submitted successfully";
            echo "<a href='index.php'><button>Go Back </button>";
        }
        $stmt->close();
        $conn->close();
    }
}
?>
