<?php
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'vcode');
     
    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    $title=$_POST['blogtitle'];
    $content=$_POST['blogcontent'];
    $result = mysqli_query($con,"select * from login where status = 1;");
    $user = mysqli_fetch_array($result)[1];
    $query = "INSERT INTO blog(title,content,username) VALUES('$title','$content','$user')";
    mysqli_query($con,$query);
    header('location:blogpost.php');
?>