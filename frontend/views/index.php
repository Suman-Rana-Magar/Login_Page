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
        <img src="https://inforrm.org/wp-content/uploads/2018/06/unknown.jpg" alt="Profile Picture" class="profile-img">
        <div class="user-name">Who Are You?</div>
        <p class="user-email">unknown@gmail.com</p>
        <span class="user-id">ID #?</span>
        <div class="icons">
            <a href="login.php"><button class="icon-btn"><i class="fas fa-sign-out-alt"></i></button></a>
        </div>
    </div>
</body>
</html>