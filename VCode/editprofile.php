<html>
<body style='background-color:#0a9dd4'>
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
<?php
include 'config.php';

$query1 = 'select username from login where status = 1;';
$result = mysqli_query($con,$query1);
$username = mysqli_fetch_array($result)[0];

$query2 = "select * from users where username = '$username'";
$result2 = mysqli_query($con,$query2);
$row = mysqli_fetch_array($result2);
echo '
<form method="post" action="editprofile.php" 
style="
background-color:#076c91;
width:40%;
margin:auto;
margin-top:100px;
text-align:center;
color:white;
font-family:sans-serif;
">
            <br>
            ';
            $defaultpath = 'styles/images/default_image.png';
            $query3 = "select profilepic from users where username='$username'";
            $profilepath = mysqli_fetch_array(mysqli_query($con,$query3))[0];
            if(isset($profilepath)){
                echo "<img src='$profilepath'>";
                echo "<br>"; 
            }else{
                echo "<img src='$defaultpath' style='width:100px;'>";
                echo "<br>";
            }
            echo "<img src=''>";
            echo "<br>";
            echo
            '
            <br>Change Username:<br>
            <input type="text" id="username" name="username" value="'.$username.'"><br>

            <br>Change Contact No:<br>
            <input type="number" id="contact" name="contact" value="'.$row[3].'"><br>

            <br>Email ID<br>
            <input type="text" id="email" name="email" value="'.$row[4].'"><br>

            <br>Country<br>
            <input type="text" id="country" name="country" value="'.$row[5].'"><br>

            <br>City<br>
            <input type="text" id="city" name="city" value="'.$row[6].'"><br>

            <br>Address<br>
            <input type="text" id="address" name="address" value="'.$row[7].'"><br>

            <br>Password<br>
            <input type="text" id="password" name="password" value="'.$row[2].'"><br>

            <input type="submit" class="submit" value="Update">
            <button onclick=document.location.href="profile.php"><a href="profile.php">Cancel<a></button><br><br>
</form>';
if(isset($_POST['username'])){
    $olduser = mysqli_fetch_array(mysqli_query($con,"select username from login where status = 1"))[0];

    $newusername = $_POST['username'];
    $newcontact = $_POST['contact'];
    $newemail = $_POST['email'];
    $newcountry = $_POST['country'];
    $newcity = $_POST['city'];
    $newaddress = $_POST['address'];
    $newpassword = $_POST['password'];


    $updateprofile = "UPDATE users 
    SET contact = '$newcontact',
    email = '$newemail',
    country = '$newcountry',
    city = '$newcity',
    address = '$newaddress',
    password = '$newpassword' WHERE username = '$olduser';";

    $data1 = mysqli_query($con,$updateprofile);

    $updateUNusers = "UPDATE users SET username = '$newusername' WHERE username = '$olduser';";
    $updateUNblog = "UPDATE blog SET username = '$newusername' WHERE username = '$olduser';";
    $updateUNusercourse = "UPDATE usercourse SET username = '$newusername' WHERE username = '$olduser';";
    $updateUNlogin = "UPDATE login SET username = '$newusername' WHERE username = '$olduser';";


    $data2 = mysqli_query($con,$updateUNusers);
    $data3 = mysqli_query($con,$updateUNblog);
    $data4 = mysqli_query($con,$updateUNusercourse);
    $data5 = mysqli_query($con,$updateUNlogin);

    if($data1&$data2&$data3&$data4&$data5){
        echo "<script>alert('succesfully updated profile');</script>";
    }else{
        echo "<script>alert('fail')</script>";
    }
}
?>
</body>
</html>
