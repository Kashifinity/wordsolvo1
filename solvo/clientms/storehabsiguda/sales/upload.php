<?php
if(!empty($_POST)) {
    $date = $_POST['date'];
    
    $CashSale = $_POST['CashSale'];
    $CardSale = $_POST['CardSale'];
    $upi = $_POST['upi'];

    // Image file uploading and validation
    $image = $_FILES['imageUpload'];
    $image_name = $image['name'];
    $image_tmp_name = $image['tmp_name'];
    $image_size = $image['size'];
    $image_error = $image['error'];
    $image_allowed_extensions = ['jpg', 'jpeg', 'png'];

    $image_extension = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));

    if($image_error === 0){
        if(!in_array($image_extension, $image_allowed_extensions)){
            echo "Error: Invalid file type. Only JPEG, JPG, and PNG files are allowed.";
            exit();
        }

        if($image_size > 6291456){ // 6MB
            echo "Error: File size is too large. Maximum file size allowed is 6MB.";
            exit();
        }

        $image_destination = 'upload/' . $image_name;
        move_uploaded_file($image_tmp_name, $image_destination);
    }
    ///////////////////////////////////////////////////////////
    $image1 = $_FILES['image'];
    $image_name = $image1['name'];
    $image_tmp_name = $image1['tmp_name'];
    $image_size = $image1['size'];
    $image_error = $image1['error'];
    $image_allowed_extensions = ['jpg', 'jpeg', 'png'];

    $image_extension = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));

    if($image_error === 0){
        if(!in_array($image_extension, $image_allowed_extensions)){
            echo "Error: Invalid file type. Only JPEG, JPG, and PNG files are allowed.";
            exit();
        }

        if($image_size > 6291456){ // 6MB
            echo "Error: File size is too large. Maximum file size allowed is 6MB.";
            exit();
        }

        $image_destinations = 'upload/' . $image_name;
        move_uploaded_file($image_tmp_name, $image_destinations);
    }

    // Database connection
    $conn = new mysqli('localhost','root','','storehabsiguda');
    if($conn->connect_error){
        echo "$conn->connect_error";
        die("Connection Failed : ". $conn->connect_error);
    } else {
        $stmt = $conn->prepare("insert into dsrupload(date,CashSale, CardSale, upi, imageUpload,image) values(?, ?, ?, ?, ?,?)");
        $stmt->bind_param("sdddss", date('Y-m-d', strtotime($date)), $CashSale, $CardSale, $upi, $image_destination,$image_destinations);
        $execval = $stmt->execute();

        if($execval === false) {
            echo "Error: " . $conn->error;
        } else {
            echo "Thank you!! Data submitted successfully";
            echo "<a href='index.php'><button>Go Back</button></a>";
        }
        $stmt->close();
        $conn->close();
    }
}
?>```
