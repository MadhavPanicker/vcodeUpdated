<?php
session_start();
header('location:login.php');

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'vcode');

$username = $_POST['username'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$country = $_POST['country'];
$city = $_POST['city'];
$address = $_POST['address'];
$password = $_POST['password'];

$s = "select * from users where username = '$username'";
$result = mysqli_query($con,$s);
$num = mysqli_num_rows($result);

if($num==1){
    echo("username already taken");
} else{
    $reg = "insert into users(username,password,contact,email,country,city,address) values('$username','$password','$contact','$email','$country','$city','$address')";
    mysqli_query($con,$reg);
    echo "registration succesful";
}
?>