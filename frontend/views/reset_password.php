<?php
session_start();
$email = $_REQUEST['email'];
$oldData = $_SESSION['old_data'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form</title>
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

        .back-link {
            margin-bottom: 15px;
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

        .file-input {
            padding-left: 35px;
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

        .links {
            margin-top: 10px;
        }

        .links a {
            color: #000;
            text-decoration: none;
            font-weight: bold;
        }

        p {
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
    <a href="login.php" class="back-link">&larr; Back to Login Page</a>
    <div class="container">
        <h2>Time To Reset Your Password</h2>
        <p>Reset your password and make it stronger and easy to remember.</p>
        <form action="../../backend/reset_password.php" method="POST">
            <input type="hidden" name="email" value="<?php echo $email; ?>">
            <div class="input-group">
                <i class="fas fa-lock" onclick="focusInput('password')"></i>
                <input type="password" id="password" placeholder="Password" required name="password" value="<?php echo $oldData['password']; ?>">
                <i class="fas fa-eye eye" onclick="togglePassword('password', this)"></i>
            </div>
            <?php echo isset($_SESSION['error']) ? "<p style='font-size: 13px; color: red; margin: 0; text-align: left;'>" . $_SESSION['error'] . "</p>" : ""; ?>
            <div class="input-group">
                <i class="fas fa-lock" onclick="focusInput('confirm-password')"></i>
                <input type="password" id="confirm-password" placeholder="Confirm Password" required name="confirm_password" value="<?php echo $oldData['confirm_password']; ?>">
                <i class="fas fa-eye eye" onclick="togglePassword('confirm-password', this)"></i>
            </div>
            <button type="submit" name="submit" class="btn">Reset Password</button>
        </form>
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

<?php
unset($_SESSION['error']);
unset($_SESSION['old_data']);
?>