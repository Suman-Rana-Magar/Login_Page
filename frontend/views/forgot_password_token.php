<?php
session_start();
$email = $_REQUEST['email'];
$token = $_REQUEST['token'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Recovery</title>
    <style>
        body {
            background-color: #6ED2E7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        a {
            text-decoration: none;
        }

        .container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        .container h2 {
            margin-bottom: 10px;
        }

        .container p {
            font-size: 14px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #222;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            width: 100%;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #444;
        }

        .back-link {
            display: block;
            margin-bottom: 15px;
            font-size: 14px;
            color: #333;
            text-decoration: none;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <a href="login.php" class="back-link">&larr; Back to log in</a>
        <h2>Token Generated Successfully</h2>
        <p>Please copy the token from url and paste it in the following field</p>
        <form action="../../backend/forgot_password_token.php" method="GET">
            <input type="hidden" name="email" value="<?php echo $email; ?>">
            <input type="hidden" name="actual_token" value="<?php echo $token; ?>">
            <?php echo isset($_SESSION['token_error']) ? "<p style='font-size: 13px; color: red; margin: 0; text-align: left;'>" . $_SESSION['token_error'] . "</p>" : ""; ?>
            <input type="text" placeholder="Enter 6 digit code here" name="token" maxlength="6" required value="<?php echo $_SESSION['old_token']; ?>">
            <button type="submit" name="submit">Recover password</button>
        </form>
    </div>
</body>

</html>

<?php
unset($_SESSION['token_error']);
unset($_SESSION['old_token']);
?>