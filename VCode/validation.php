<?php
session_start();

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'vcode');

$username = $_POST['username'];
$password = $_POST['password'];

$s = "select * from users where username = '$username' && password = '$password'";
$result = mysqli_query($con,$s);
$num = mysqli_num_rows($result);

if($num==1){
    $t = "insert into login(username,status) values('$username',1);";
    mysqli_query($con,$t);
    header('location:home.php');
} else{
    header('location:loginfailed.php');
}
?>