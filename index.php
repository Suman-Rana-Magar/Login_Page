<?php
session_start();
include "backend/db_connect.php";
if (isset($_SESSION["email"])) {
    $email = $_SESSION["email"];
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $name = $row["name"];
    $email = $row["email"];
    $id = $row["id"];
    $image = $row["image"];
}
$link = isset($email) ? "backend/logout.php" : "frontend/views/login.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #6ec6de;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 350px;
        }

        .profile-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .user-name {
            font-size: 20px;
            font-weight: bold;
        }

        .user-email {
            color: blue;
            text-decoration: none;
            margin-bottom: 10px;
            margin-top: 5px;
        }

        .user-id {
            color: magenta;
            margin-bottom: 15px;
            display: block;
        }

        .icons {
            margin-top: 10px;
        }

        .icon-btn {
            background-color: red;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <div class="container">
        <img src="<?php echo isset($image) ? $image : '../frontend/assets/images/unknown.jpg' ?>" alt="Profile Picture" class="profile-img">
        <div class="user-name"><?php echo isset($name) ? $name : "Who Are You?" ?></div>
        <p class="user-email"><?php echo isset($email) ? $email : "Unknown@domain.com" ?></p>
        <span class="user-id">ID #<?php echo isset($id) ? $id : "?" ?></span>
        <div class="icons">
            <a href="<?php echo $link ?>"><button class="icon-btn"><i class="fas fa-sign-out-alt"></i></button></a>
        </div>
    </div>
</body>

</html>