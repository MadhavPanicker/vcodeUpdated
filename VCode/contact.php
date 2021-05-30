<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact</title>
    <link rel=stylesheet href="styles/contact.css">
</head>

<body>
    <div class="menu-bar">
        <ul>
            <li><a href="#"><b>VCode</b></a></li>
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
            <li><a href="home.php">About</a></li>
            <li class="active"><a href="#">Contact</a></li>
            <?php
                $con = mysqli_connect('localhost','root','');
                mysqli_select_db($con,'vcode');
                $result = mysqli_query($con,"select username from login where status = 1;");
                $rows = mysqli_num_rows($result);
                if($rows>=1){
                    echo "<li><a href='profile.php'>Profile</a></li><li><a href='logout.php'>logout</a></li>";
                    
                } else{
                    echo "<li><a href='login.php'>Login</a></li><li><a href='signup.php'>Signup</a></li>";
                }
            ?>
        </ul>
    </div>
    <div class="main">
        <br><br>
        
        <?php
        $user = mysqli_fetch_array($result)[0];
        if($user=='admin'){
            echo "<h1>feedback messages</h1><br><br>";
            $result3 = mysqli_query($con,"select * from feedback");
            while($res=mysqli_fetch_array($result3)){
                echo "<br><hr>from: <b>$res[2], $res[1]</b><br><br>$res[3]<hr><br>";
            }
        }else{
            echo"
            <h1 style='text-align: center;'>Contact Us</h1><br><br>
            <form method='POST' action='contact.php'>
                Name<br>
                <input type='text' name='name'><br><br>
                Email<br>
                <input type='text' name='email'><br><br>
                Feedback<br>
                <textarea class='feedback' name='feedback'></textarea><br><br>
                <input type='submit'><br><br>
            </form>";
        }
        if(isset($_POST['feedback'])){
            $name=$_POST['name'];
            $email=$_POST['email'];
            $feedback=$_POST['feedback'];
            $result2=mysqli_query($con,"insert into feedback(name,email,feedback) values('$name','$email','$feedback')");
        }
        ?>
</body>

</html>