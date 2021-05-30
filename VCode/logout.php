<?php
    session_start();

    $con = mysqli_connect('localhost','root','');
    mysqli_select_db($con,'vcode');
    $query = "update login set status=0 where status=1;";
    mysqli_query($con,$query);
    header('location:index.php');
?>