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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
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
            <div class="input-group">
                <i class="fas fa-key" onclick="focusInput('token')"></i>
                <input type="text" placeholder="Enter 6 digit code here" name="token" maxlength="6" required value="<?php echo $_SESSION['old_token']; ?>">
            </div>
            <button type="submit" class="btn" name="submit">Recover password</button>
        </form>
    </div>

    <script src="../assets/js/scripts.js"></script>
</body>

</html>

<?php
unset($_SESSION['token_error']);
unset($_SESSION['old_token']);
?>