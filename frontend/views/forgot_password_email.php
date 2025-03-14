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
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <a href="login.php" class="back-link">&larr; Back to log in</a>
    <div class="container">
        <h2>Forgot your password?</h2>
        <p>Don't fret! Just type in your email and we will send you a code to reset your password!</p>
        <form action="../../backend/forgot_password_email.php" method="GET">
            <?php echo isset($_SESSION['error']) ? "<p style='font-size: 13px; color: red; margin-top: -10px; margin-bottom: 5px; text-align: left;'>" . $_SESSION['error'] . "</p>" : ""; ?>
            <div class="input-group">
                <i class="fas fa-envelope" onclick="focusInput('email')"></i>
                <input type="email" id="email" name="email" placeholder="example@something.com" required value="<?php echo $_SESSION['oldData']; ?>">
            </div>
            <button type="submit" class="btn" name="submit">Send Code</button>
        </form>
    </div>

    <script src="../assets/js/scripts.js"></script>
</body>

</html>

<?php
unset($_SESSION['error']);
unset($_SESSION['oldData']);
?>