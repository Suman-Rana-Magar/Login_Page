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

        .image {
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
        <h2>Create Account</h2>
        <form action="../../backend/signup.php" method="POST" enctype="multipart/form-data">
            <div class="input-group">
                <i class="fas fa-user" onclick="focusInput('name')"></i>
                <input type="text" id="name" name="name" placeholder="Name" required>
            </div>
            <div class="input-group">
                <i class="fas fa-envelope" onclick="focusInput('email')"></i>
                <input type="email" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-group">
                <i class="fas fa-file" onclick="focusInput('image')"></i>
                <input type="file" id="image" name="image" class="image" required>
            </div>
            <div class="input-group">
                <i class="fas fa-lock" onclick="focusInput('password')"></i>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <i class="fas fa-eye eye" onclick="togglePassword('password', this)"></i>
            </div>
            <div class="input-group">
                <i class="fas fa-lock" onclick="focusInput('confirm-password')"></i>
                <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm Password" required>
                <i class="fas fa-eye eye" onclick="togglePassword('confirm-password', this)"></i>
            </div>
            <button type="submit" class="btn" name="submit">Sign up</button>
        </form>
        <div class="links">Already have an account? <a href="login.php">Login here</a></div>
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