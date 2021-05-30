<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/login.css">
    <title>Login</title>
</head>

<body>
    <div class="login">
        <b>Login</b><br>
        <hr>
        <form action="validation.php" method="POST">
        <label for="username">Username</label>
        <input type="text" id="username" name="username"><br>

        <label for="password">Password</label>
        <input type="password" id="password" name="password"><br>

        <button class="submit">Login</button><br>
        Not yet registered? <a href="signup.php">Signup</a><br>
        </form>
        <a href="index.php"><button class="cancel">Cancel</button></a>
    </div>
    <br>
    <p style="text-align:center">Login Failed<p>
</body>

</html>