<?php
session_start();
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
    <title>Signup Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <a href="../../index.php" class="back-link">&larr; Back to homepage</a>
    <div class="container">
        <h2>Create Account</h2>
        <form action="../../backend/signup.php" method="POST" enctype="multipart/form-data">
            <div class="input-group">
                <i class="fas fa-user" onclick="focusInput('name')"></i>
                <input type="text" id="name" name="name" placeholder="Name" required value="<?php echo $oldData['name'] ?>">
            </div>
            <?php echo isset($errors['email']) ? "<p class='error-message' style='color: red; font-size: 13px;'>" . $errors['email'] . "</p>" : ""; ?>
            <div class="input-group">
                <i class="fas fa-envelope" onclick="focusInput('email')"></i>
                <input type="email" id="email" name="email" placeholder="Email" required value="<?php echo $oldData['email'] ?>">
            </div>
            <?php echo isset($errors['image']) ? "<p class='error-message' style='color: red; font-size: 13px;'>" . $errors['image'] . "</p>" : ""; ?>
            <div class="input-group">
                <i class="fas fa-file" onclick="focusInput('image')"></i>
                <input type="file" id="image" name="image" class="image" required>
            </div>
            <div class="input-group">
                <i class="fas fa-lock" onclick="focusInput('password')"></i>
                <input type="password" id="password" name="password" placeholder="Password" required value="<?php echo $oldData['password'] ?>">
                <i class="fas fa-eye eye" onclick="togglePassword('password', this)"></i>
            </div>
            <?php echo isset($errors['password']) ? "<p class='error-message' style='color: red; font-size: 13px;'>" . $errors['password'] . "</p>" : ""; ?>
            <div class="input-group">
                <i class="fas fa-lock" onclick="focusInput('confirm-password')"></i>
                <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm Password" required value="<?php echo $oldData['confirm-password'] ?>">
                <i class="fas fa-eye eye" onclick="togglePassword('confirm-password', this)"></i>
            </div>
            <button type="submit" class="btn" name="submit">Sign up</button>
        </form>
        <div class="links">Already have an account? <a href="login.php">Login here</a></div>
    </div>

    <script src="../assets/js/scripts.js"></script>
</body>

</html>
<?php
unset($_SESSION['errors']);
unset($_SESSION['oldData']);
?>