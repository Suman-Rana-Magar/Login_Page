<?php
include "db_connect.php";
session_start();
if (isset($_POST["submit"])) {
    $errors = [];
    $oldData = [];
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        // Get file info
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        // Allowed extensions
        $allowed_exts = array("jpg", "jpeg", "png", "gif", "webp");

        // Validate extension and size
        if (!in_array($file_ext, $allowed_exts)) {
            $errors['image'] = "Only JPG, JPEG, PNG , WEBP & GIF files are allowed";
        }

        if ($file_size > 2097152) { // 2MB in bytes
            $errors['image'] = "File size must be less than 2MB";
        }

        if (empty($errors['image'])) {
            $upload_dir = '../frontend/assets/images/';
            $file_name = str_replace(' ', '_', $file_name);
            $target_path = $upload_dir . basename($file_name);
            move_uploaded_file($tmp_name, $target_path);
            $image = $target_path;
        }
    }

    $name = $oldData['name'] = $_POST["name"];
    $email = $oldData['email'] = $_POST["email"];
    $password = $oldData['password'] = $_POST["password"];
    $confirm_password = $oldData['confirm-password'] = $_POST["confirm-password"];
    if ($password != $confirm_password) {
        $errors['password'] = "Password and Confirm Password do not match";
    }

    $insert = "INSERT INTO users(name,email,image,password)VALUES('$name','$email','$image','$password')";
    $check_user = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($check_user) > 0) {
        $errors['email'] = "Email already exist !";
    }
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['oldData'] = $oldData;
        header("Location: ../frontend/views/signup.php");
        exit();
    }
    if (mysqli_query($conn, $insert)) {
        echo "<script> alert('Account Created Successfully !')</script>";
        echo "<script> window.open('../frontend/views/login.php','_SELF')</script>";
    } else {
        die("Error Detected !" . mysqli_error($conn));
    }
    mysqli_close($conn);
}
