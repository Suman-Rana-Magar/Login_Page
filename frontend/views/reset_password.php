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
    <link rel="stylesheet" href="../assets/css/styles.css">
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

    <script src="../assets/js/scripts.js"></script>
</body>

</html>

<?php
unset($_SESSION['error']);
unset($_SESSION['old_data']);
?>