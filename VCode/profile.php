<?php
session_start();

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'vcode');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=stylesheet href="styles/profile.css">
    <title>VCode</title>
</head>

<body>
    <div class="menu-bar">
        <ul>
            <li><a href="#"><b>VCode</b></a></li>
            <li><a href="home.php">Home</a></li>
            <li><a href="enrolledcourses.php">Online Courses</a>
                <div class="submenu1">
                    <ul>
                        <li><a href="html.php">HTML</a></li>
                        <li><a href="javascript.php">Javascript</a></li>
                        <li><a href="python.php">Python</a></li>
                        <li><a href="sql.php">SQL</a></li>
                    </ul>
                </div>
            </li>
            <li><a href="blog.php">Blog</a></li>
            <li><a href="#">About</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li class="active"><a href="login.php">Profile</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <br>
    <br>
    <br>
    <div class="main1" style="background-color:#076c91;margin-top: 500px;width: 50%;margin: auto; text-align: center;border-radius: 5px;box-shadow: 2px 2px 8px black">
        <div class="dp" style="margin:auto">
            <img src="styles/images/default_image.png" style="width: 100px; margin: auto; margin-top:20px; border-radius: 50px">
        </div>
        <?php
            $a = "select username from login where status = 1;";
            $onlineresult = mysqli_query($con,$a);
            $row=mysqli_fetch_row($onlineresult);

            $onlinedetails = mysqli_query($con,"select * from users where username = '$row[0]'");
            $row2=mysqli_fetch_row($onlinedetails);
            echo '<br>username: ',$row2[1],'<br><br>contact: ',$row2[3],'<br><br>email: ',$row2[4],'<br><br>country: ',$row2[5],'<br><br>city: ',$row2[6],'<br><br>address: ',$row2[7],'<br><br>';
        ?>
        <button onclick=document.location.href='editprofile.php' style="border:none; padding:5px; border-radius:3px;cursor:pointer">Edit profile</button><br><br>
    </div>
</body>

</html>