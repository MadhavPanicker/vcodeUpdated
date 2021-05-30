<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/home.css">
    <title>Home|VCode</title>
</head>

<body>
    <div class="menu-bar">
        <ul>
            <li><a href="home.php"><b>VCode</b></a></li>
            <?php
                $con = mysqli_connect('localhost','root','');
                mysqli_select_db($con,'vcode');
                $result = mysqli_query($con,"select * from login where status = 1;");
                $rows = mysqli_num_rows($result);
                if($rows>=1){
                    echo "<li><a href='home.php'>Home</a></li>";
                    
                } else{
                    echo "<li><a href='index.php'>Home</a></li>";
                }
            ?>
            <li class="active"><a href="enrolledcourses.php">Online Courses</a>
                <div class="submenu1">
                    <ul>
                        <li><a href="html.php">HTML</a></li>
                        <li><a href="Javascript.php">Javascript</a></li>
                        <li><a href="python.php">Python</a></li>
                        <li><a href="sql.php">SQL</a></li>
                    </ul>
                </div>
            </li>
            
            <li><a href="blog.php">Blog</a></li>
            <li><a href="#">About</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div><br><br>
    <div style="text-align:center; font-size:30px;"> Enrolled courses: </div><br><br>
    <div>
    <?php
     $con = mysqli_connect('localhost','root','');
     mysqli_select_db($con,'vcode');
     $user = mysqli_fetch_array(mysqli_query($con,"select username from login where status = 1;"))[0];
     $query = "select * from usercourse where username = '$user';";
     $courses = mysqli_query($con,$query);
     if(mysqli_num_rows($courses)==0){
        echo "<center style='color:red;'>You have not enrolled in any courses.</center>";
     } else{
        while($res = mysqli_fetch_array($courses)){
            echo "<br><center><button style='width:400px;height:100px;background-color:white;color:black;font-size:30px;cursor:pointer' onclick=document.location.href='about".$res['Course'].".html'>".$res['Course']."</button></center><br>";
        } 
     }
    ?>
    </div>