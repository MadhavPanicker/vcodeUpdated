<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/sql.css">
    <title>SQL|VCode</title>
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
    </div><br><br>
    <div class="intro">
        <br>
        <h1>Structured Query Language(SQL)</h1>
        <br><br>
        <a href="https://en.wikipedia.org/wiki/SQL" target="_blank">
            <img src="https://pbs.twimg.com/profile_images/1255113654049128448/J5Yt92WW_400x400.png" id="sql_img"></a>


        <p id="intro" style="padding: 5%;">SQL (Structured Query Language) is a domain-specific language used in
            programming
            and designed for managing data held in a relational database management system (RDBMS), or for stream
            processing
            in a relational data stream management system (RDSMS). It is particularly useful in handling structured
            data, i.e.
            data incorporating relations among entities and variables. SQL offers two main advantages over older
            read–write APIs
            such as ISAM or VSAM. Firstly, it introduced the concept of accessing many records with one single command.
            Secondly,
            it eliminates the need to specify how to reach a record, e.g. with or without an index.</p>
    </div><br><br><br><br><br>
    <div class="details">
        <br>
        <h2>Course details:</h2>

        <p style="padding: 10%;"> Software version: MySQL 8.0<br>
            Course Duration: 36 hours.<br>
            Previous Language requirements: None.<br>
            Assignments: To be uploaded in the link given by the instructor.<br>
            Preferred IDE: MySQL.<br></p>
    </div><br><br><br><br><br>
    <div class="instr">
        <div class="instra">
            <br>
            <h2 style="text-align: center; font-size:1.75em;">Faculties:</h2><br><br>
            <div class="instr1">
                <img src="https://sc01.alicdn.com/kf/H3beb4a5aca3d4c57adea6c3dc0a6be97d/200605461/H3beb4a5aca3d4c57adea6c3dc0a6be97d.png_.webp"
                    alt="Professor A" id="prof1" alt="Professor A">
                <p style="color:white;">Professor A has excelled in learning and analyzing databases for industrial
                    applications
                    and has around 20 years of teaching experience. Click the image to view profile.</p>
            </div><br>
            <div class="instr2">

                <img src="https://di2ponv0v5otw.cloudfront.net/posts/2020/10/05/5f7ba48cce5f1cc4ba989172/m_5f7ba48cce5f1cc4ba989173.jpeg"
                    alt="Professor B" id="prof2" alt="Professor B">
                <p style="color: white;">Professor B is a young and aspiring instructor who wishes to teach to gain
                    experience.
                    She has been specializing in structuring backend for websites since her college days. Click image to
                    view profile.</p>
            </div>
        </div>
    </div>
    <br><br><br>
    <?php
        $con = mysqli_connect('localhost','root','');
        mysqli_select_db($con,'vcode');
        $result = mysqli_query($con,"select * from login where status = 1;");
        $rows = mysqli_num_rows($result);
        $user = mysqli_fetch_array($result)[1];
        if($rows>='1'){
            echo "<form method='POST' style='text-align:center;'><input style='border: 1px solid black;width: 30%; margin: auto; border-radius: 5px;cursor:pointer;background-color: white; color: black; font-size: 30px' name='sql' value='enroll sql' type='submit'></form>";
        }
        if (isset($_POST['sql'])){
            if ($_POST['sql'] == 'enroll sql') {
                mysqli_query($con,"insert into usercourse(username,Course) values('$user','sql')");
            }
        }
    ?><br>
</body>
<footer>
    <div class="footer">
        <p><br>
            <marquee class="marquee">Contact us on Instagram: @vcodeind, LinkedIn and Facebook
            </marquee>
        </p>
</footer>

</html>