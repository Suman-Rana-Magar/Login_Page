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
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <div class="super_container">
        <a href="../../index.php" class="back-link">&larr; Back to homepage</a>
        <?php if (isset($_SESSION['success'])): ?>
            <div class="success-message">
                <p><?php echo $_SESSION['success']; ?></p>
            </div>
        <?php endif; ?>
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
    </div>

    <script src="../assets/js/scripts.js"></script>
</body>

</html>

<?php
unset($_SESSION['errors']);
unset($_SESSION['oldData']);
unset($_SESSION['success']);
?>