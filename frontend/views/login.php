<?php
session_start();
if (isset($_SESSION["email"])) {
    header("Location: ../../index.php");
    exit();
}
if (isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    $oldData = $_SESSION['oldData'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
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
            margin-bottom: 20px;
        }

        .input-group {
            position: relative;
            margin-bottom: 15px;
        }

        .input-group input {
            width: 100%;
            padding: 10px 40px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .input-group i {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .input-group .eye {
            right: 10px;
            left: auto;
            cursor: pointer;
        }

        .btn {
            width: 100%;
            padding: 10px;
            background: #222;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        .links {
            margin-top: 10px;
        }

        .links a {
            color: #000;
            text-decoration: none;
            font-weight: bold;
        }

        .back-link {
            margin-bottom: 20px;
        }

        .error-message {
            text-align: left;
            margin-top: -10px;
        }

        @media (max-width: 400px) {
            .container {
                width: 90%;
            }
        }
    </style>
</head>

<body>
    <a href="../../index.php" class="back-link">&larr; Back to homepage</a>
    <div class="container">
        <h2>Login to our platform</h2>
        <form action="../../backend/login.php" method="POST">
            <div class="input-group">
                <i class="fas fa-envelope" onclick="focusInput('email')"></i>
                <input type="email" id="email" name="email" placeholder="Email" required value="<?php echo $oldData['email'] ?>">
            </div>
            <div class="input-group">
                <i class="fas fa-lock" onclick="focusInput('password')"></i>
                <input type="password" id="password" name="password" placeholder="Password" required value="<?php echo $oldData['password'] ?>">
                <i class="fas fa-eye eye" onclick="togglePassword('password', this)"></i>
            </div>
            <?php echo isset($errors['email']) ? "<p class='error-message' style='color: red; font-size: 13px;'>" . $errors['email'] . "</p>" : ""; ?>
            <div class="links"><a href="forgot_password_email.php">Forgot password?</a></div>
            <button type="submit" class="btn" name="submit">Sign in</button>
        </form>
        <div class="links">Not registered? <a href="signup.php">Create account</a></div>
    </div>

    <script>
        function togglePassword(id, icon) {
            let input = document.getElementById(id);
            if (input.type === "password") {
                input.type = "text";
                icon.classList.replace("fa-eye", "fa-eye-slash");
            } else {
                input.type = "password";
                icon.classList.replace("fa-eye-slash", "fa-eye");
            }
        }

        function focusInput(id) {
            document.getElementById(id).focus();
        }
    </script>
</body>

</html>