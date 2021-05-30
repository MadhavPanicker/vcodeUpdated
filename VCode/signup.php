<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/signup.css">
    <title>Register</title>
    <script>
        function validateform() {
            var name = document.myform.username.value;
            var password = document.myform.password.value;
            var contact = document.myform.contact.value;
            var email = document.myform.email.value;

            if (name == null || name == "") {
                alert("Name can't be blank");
                return false;
            } else if (password.length < 6) {
                alert("Password must be at least 6 characters long.");
                return false;
            } else if (contact.length > 10) {
                alert("Invalid contact no.");
                return false;
            } else if (!(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email))) {
                alert("Invalid email");
                return false;
            }
        }
    </script>
</head>

<body>
    <div class="Register">
        <b>Register</b><br>
        <hr>
        <form name="myform" onsubmit="return validateform()" action="registration.php" method="post">
            Username<br>
            <input type="text" id="username" name="username"><br>

            Contact No.<br>
            <input type="number" id="contact" name="contact"><br>

            Email ID<br>
            <input type="text" id="email" name="email"><br>

            Country<br>
            <input type="text" id="country" name="country"><br>

            City<br>
            <input type="text" id="city" name="city"><br>

            Address<br>
            <input type="text" id="address" name="address"><br>

            Password<br>
            <input type="password" id="password" name="password"><br>

            <input type="submit" class="submit" value="Register"><br>
            Already have an account?<a href="login.php">Login</a><br>


        </form>
        <a href="index.php"><button class="cancel">Cancel</button></a>
    </div>
</body>

</html>