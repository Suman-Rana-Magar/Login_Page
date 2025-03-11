<?php
$servername = "localhost";
$username = "root";
$password = "root";
$database = "login_page";
$port = 33061;

$conn = new mysqli($servername, $username, $password, $database, $port);
if ($conn->connect_error) {
    die("Error Detected!" . $conn->connect_error);
}

//check if table exist
$exist = mysqli_query($conn, "SHOW TABLES LIKE 'users'");
if (!(mysqli_num_rows($exist) > 0)) {
    $sql = "CREATE TABLE users (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    image VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    if (!mysqli_query($conn, $sql)) {
        die("Error creating table: " . mysqli_error($conn));
    }
}
