<?php
if(!empty($_POST)) {
    $date = $_POST['date'];
    $value = $_POST['value'];
   
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
    $conn = new mysqli('localhost','root','','storehabsiguda');
    if($conn->connect_error){
        echo "$conn->connect_error";
        die("Connection Failed : ". $conn->connect_error);
    } else {
        $stmt = $conn->prepare("insert into invoiceupload(date,  value,  imageUpload) values(?, ?, ?)");
        $stmt->bind_param("sds", date('Y-m-d', strtotime($date)),  $value, $image_destination);
        $execval = $stmt->execute();

        if($execval === false) {
            echo "Error: " . $conn->error;
        } else {
            echo "Data submitted successfully";
        }
        $stmt->close();
        $conn->close();
    }
}
?>
