<?php
if(!empty($_POST)) {
    $PettyDate = isset($_POST['PettyDate']) ? $_POST['PettyDate'] : '';
    $Particular = isset($_POST['Particular']) ? $_POST['Particular'] : '';
    $OBalance = isset($_POST['OBalance']) ? $_POST['OBalance'] : '';
    $ClosingBalance = isset($_POST['ClosingBalance']) ? $_POST['ClosingBalance'] : '';
    $Expenditure = isset($_POST['Expenditure']) ? $_POST['Expenditure'] : '';
    $imageUpload = isset($_POST['imageUpload']) ? $_POST['imageUpload'] : '';

    // Image file uploading
    $image = isset($_FILES['imageUpload']) ? $_FILES['imageUpload'] : '';
    if (!empty($image) && $image['error'] === 0) {
        $image_name = $image['name'];
        $image_tmp_name = $image['tmp_name'];
        $image_size = $image['size'];
        $image_destination = 'uploads/' . $image_name;
        move_uploaded_file($image_tmp_name, $image_destination);
    } else {
        $image_destination = '';
    }

    // Database connection
    $conn = new mysqli('localhost','root','','store');
    if($conn->connect_error){
        echo "$conn->connect_error";
        die("Connection Failed : ". $conn->connect_error);
    } else {
        $stmt = $conn->prepare("insert into pettycash(PettyDate, Particular, OBalance, ClosingBalance, Expenditure, imageUpload) values(?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("siidds", date('Y-m-d', strtotime($PettyDate)), $Particular, $OBalance, $ClosingBalance, $Expenditure,$image_destination);
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
