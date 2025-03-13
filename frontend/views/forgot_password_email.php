<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        a {
            text-decoration: none;
        }

        body {
            background-color: #6ec6de;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            width: 350px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .container h2 {
            margin-bottom: 10px;
        }

        .container p {
            font-size: 14px;
            color: #555;
            margin-bottom: 20px;
        }

        .input-group {
            position: relative;
            margin-bottom: 15px;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .btn {
            width: 100%;
            padding: 10px;
            background: #222;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .back-link {
            margin-bottom: 20px;
        }

        @media (max-width: 400px) {
            .container {
                width: 90%;
            }
        }
    </style>
</head>

<body>
    <a href="login.php" class="back-link">&larr; Back to log in</a>
    <div class="container">
        <h2>Forgot your password?</h2>
        <p>Don't fret! Just type in your email and we will send you a code to reset your password!</p>
        <form action="../../backend/forgot_password_email.php" method="POST">
            <?php echo isset($_SESSION['error']) ? "<p style='font-size: 13px; color: red; margin-top: -10px; margin-bottom: 5px; text-align: left;'>" . $_SESSION['error'] . "</p>" : ""; ?>
            <div class="input-group">
                <input type="email" id="email" name="email" placeholder="example@something.com" required value="<?php echo $_SESSION['oldData']; ?>">
            </div>
            <button type="submit" class="btn" name="submit">Send Code</button>
        </form>
    </div>
</body>

</html>

<?php
unset($_SESSION['error']);
unset($_SESSION['oldData']);
?>