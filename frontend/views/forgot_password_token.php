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
        <h2>Token Sent To Your Email</h2>
        <p>We have sent a 6-digit code to your email "suman@gmail.com", enter that code in the following field.</p>
        <form>
            <input type="text" placeholder="Enter 6 digit code here" maxlength="6" required>
            <button type="submit">Recover password</button>
        </form>
    </div>
</body>

</html>