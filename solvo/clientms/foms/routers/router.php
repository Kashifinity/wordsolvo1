<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include '../includes/connect.php';
$success = false;

$username = $_POST['username'];
$password = $_POST['password'];

// Prepare the statement for Administrator role
$stmt = mysqli_prepare($con, "SELECT * FROM users WHERE username=? AND role='Administrator' AND not deleted;");
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);

// Fetch the result
$result = mysqli_stmt_get_result($stmt);

while ($row = mysqli_fetch_array($result)) {
    if (password_verify($password, $row['password'])) {
        $success = true;
        $user_id = $row['id'];
        $name = $row['name'];
        $role = $row['role'];
        break;
    }
}

if ($success == true) {
    session_start();
    $_SESSION['admin_sid'] = session_id();
    $_SESSION['user_id'] = $user_id;
    $_SESSION['role'] = $role;
    $_SESSION['name'] = $name;

    header("location: ../admin-page.php");
    exit();
} else {
    // Prepare the statement for Customer role
    $stmt = mysqli_prepare($con, "SELECT * FROM users WHERE username=? AND role='Customer' AND not deleted;");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    // Fetch the result
    $result = mysqli_stmt_get_result($stmt);

    while ($row = mysqli_fetch_array($result)) {
        if (password_verify($password, $row['password'])) {
            $success = true;
            $user_id = $row['id'];
            $name = $row['name'];
            $role = $row['role'];
            break;
        }
    }

    if ($success == true) {
        session_start();
        $_SESSION['user_id'] = $user_id;
        $_SESSION['name'] = $name;
        $_SESSION['customer_sid'] = session_id();
        $_SESSION['role'] = 'Customer';
        header("location: ../index.php");
        exit();
    } else {
        // Prepare the statement for Writer role
        $stmt = mysqli_prepare($con, "SELECT * FROM users WHERE username=? AND role='Writer' AND not deleted;");
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);

        // Fetch the result
        $result = mysqli_stmt_get_result($stmt);

        while ($row = mysqli_fetch_array($result)) {
            if (password_verify($password, $row['password'])) {
                $success = true;
                $user_id = $row['id'];
                $name = $row['name'];
                $role = $row['role'];
                break;
            }
        }

        if ($success == true) {
            session_start();
            $_SESSION['user_id'] = $user_id;
            $_SESSION['name'] = $name;
            $_SESSION['writer_sid'] = session_id();
            $_SESSION['role'] = 'Writer';
            header("location: ../writer.php");
            exit();
        } 
    }
}

?>
