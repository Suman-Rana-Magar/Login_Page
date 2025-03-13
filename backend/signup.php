<?php
include "db_connect.php";

if (isset($_POST["submit"])) {

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        // Get the file's temporary path
        $tmp_name = $_FILES['image']['tmp_name'];

        // Get the target directory (e.g., where you want to store the uploaded file)
        $upload_dir = '../frontend/assets/images/';

        // Get the full path including the file name
        $file_name = $_FILES['image']['name'];
        $file_name = str_replace(' ', '_', $file_name);
        $target_path = $upload_dir . basename($file_name);
        // Move the uploaded file to the target directory
        move_uploaded_file($tmp_name, $target_path);
        $image = $target_path;
    }

    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $insert = "INSERT INTO users(name,email,image,password)VALUES('$name','$email','$image','$password')";
    $check_user = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($check_user) > 0) {
        echo "<script>alert('Email already exist ! Please use another email and try again !')</script>";
        echo "<script> window.open('../frontend/views/signup.php','_SELF')</script>";
    } else if (mysqli_query($conn, $insert)) {
        echo "<script> alert('Account Created Successfully !')</script>";
        echo "<script> window.open('../frontend/views/login.php','_SELF')</script>";
    } else {
        die("Error Detected !" . mysqli_error($conn));
    }
    mysqli_close($conn);
}
