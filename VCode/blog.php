<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=stylesheet href="blog.css">
    <title>Blog</title>
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
                        <li><a href="Javascript.php">Javascript</a></li>
                        <li><a href="python.php">Python</a></li>
                        <li><a href="python.php">SQL</a></li>
                    </ul>
                </div>
            </li>
            <li class="active"><a href="blog.html" >Blog</a></li>
            <li><a href="#">About</a></li>
            <li><a href="contact.php">Contact</a></li>
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
    <br><br>
    <?php
        $con = mysqli_connect('localhost','root','');
        mysqli_select_db($con,'vcode');
        $result = mysqli_query($con,"select * from login where status = 1;");
        $rows = mysqli_num_rows($result);
        $blog = mysqli_query($con,"select * from blog order by created_at desc;");
        if($rows>=1){
            echo"<center>
            <button onclick=document.location.href='blogpost.php' 
            style='height:30px;
            width:100px;
            font-size:20px;
            background-color:rgb(60, 179, 113);
            color:white;
            font-weight:bold;
            border:1px solid black;
            cursor:pointer;'>Post</button>
            </center>";
        }
        while($res = mysqli_fetch_array($blog)){
            echo "
            <br><div
            style='color:white;
            background-color:#076c91;
            width:60%;
            margin:auto;
            text-align:left;
            padding:10px;
            '
            >
            <br><h2>$res[4]</h2>
            <div style='text-align:left'>
            <h3>by $res[1] ,".timeAgo($res[2])."</h3><hr><br>
            $res[3]<br><br>
            </div>

            <form method='POST' action='blog.php'><hr><br>
            <textarea 
            style='background-color:#0a9dd4;border:1px solid #076c91; width:100%;height:40px;'
            type='text' name='comment' placeholder='write your comment'></textarea>

            <br><input type='submit' value='post comment' 
            style='width:auto;height:auto;padding:3px;background-color:rgb(60, 179, 113);cursor:pointer;color:white;font-weight:bold;border:1px solid black'
            name='submit_comment'>
            <input name='bid' value='$res[0]' style='background-color:#076c91;border:0;color:#076c91;'>
            <br><br> 
            </form>

            <div style='background-color:#0a9dd4'>";
            $query2 = "select * from comments where bid='$res[0]'";
            $result2 = mysqli_query($con,$query2);
            $commentArr = mysqli_fetch_array($result2);
            echo"
            </div>";
            if($commentArr){
                while($res2=mysqli_fetch_array($result2)){
                    echo "<div style='background-color:#0a9dd4; padding:10px'><b>$res2[1], ".timeAgo($res2[3])."</b><br><hr>$res2[2]</div>";
                }
            }
            echo "</div>
            <br>
            ";
        }
        if(isset($_POST['comment'])){
            $comment = $_POST['comment'];
            $user = mysqli_fetch_array(mysqli_query($con,"select username from login where status = 1"))[0];
            $bid = $_POST['bid'];
            $comment = $_POST['comment'];
            $query = "insert into comments(bid,username,comment) values($bid,'$user','$comment')";
            mysqli_query($con,$query);
        }
        function timeAgo($time_ago)
        {
            $time_ago = strtotime($time_ago);
            $cur_time   = time();
            $time_elapsed   = $cur_time - $time_ago + 12597;
            $seconds    = $time_elapsed ;
            $minutes    = round($time_elapsed / 60 );
            $hours      = round($time_elapsed / 3600);
            $days       = round($time_elapsed / 86400 );
            $weeks      = round($time_elapsed / 604800);
            $months     = round($time_elapsed / 2600640 );
            $years      = round($time_elapsed / 31207680 );
            // Seconds
            if($seconds <= 60){
                return "just now";
            }
            //Minutes
            else if($minutes <=60){
                if($minutes==1){
                    return "one minute ago";
                }
                else{
                    return "$minutes minutes ago";
                }
            }
            //Hours
            else if($hours <=24){
                if($hours==1){
                    return "an hour ago";
                }else{
                    return "$hours hrs ago";
                }
            }
            //Days
            else if($days <= 7){
                if($days==1){
                    return "yesterday";
                }else{
                    return "$days days ago";
                }
            }
            //Weeks
            else if($weeks <= 4.3){
                if($weeks==1){
                    return "a week ago";
                }else{
                    return "$weeks weeks ago";
                }
            }
            //Months
            else if($months <=12){
                if($months==1){
                    return "a month ago";
                }else{
                    return "$months months ago";
                }
            }
            //Years
            else{
                if($years==1){
                    return "one year ago";
                }else{
                    return "$years years ago";
                }
            }
        }
    ?>
</body>
</html>