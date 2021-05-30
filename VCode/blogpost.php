<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>post</title>
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
            <li><a href="#">About</a></li>
            <li class="active"><a href="contact.php">Contact</a></li>
            <?php
                $con = mysqli_connect('localhost','root','');
                mysqli_select_db($con,'vcode');
                $result = mysqli_query($con,"select * from login where status = 1;");
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
        <h1 style="text-align: center;">Post your blog</h1><br><br>
        <form method='POST' action='blogprocess.php'>
            Title of blog<br>
            <input type="text" name='blogtitle'><br><br>
            Content<br>
            <textarea class="feedback" name='blogcontent'></textarea><br><br>
            <input type="submit" style='cursor:pointer'><br><br>
        </form>
</body>

</html>