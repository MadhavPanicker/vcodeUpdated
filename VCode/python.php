<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/python.css">
    <title>Python|VCode</title>
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
        <h1>Python</h1>
        <br><br>
        <a href="https://en.wikipedia.org/wiki/Python_(programming_language)" target="_blank">
            <img src="https://www.dailyhostnews.com/wp-content/uploads/2018/07/Python-featured-2100x1200.jpg"
                id="py_img"></a>


        <p id="intro" style="padding: 5%;">Python is an interpreted, high-level and general-purpose programming
            language.
            Python's design philosophy emphasizes code readability with its notable use of significant indentation. Its
            language constructs and object-oriented approach aim to help programmers write clear, logical code for small
            and large-scale projects. Python is dynamically-typed and garbage-collected. It supports multiple
            programming
            paradigms, including structured (particularly, procedural), object-oriented and functional programming.
            Python
            is often described as a "batteries included" language due to its comprehensive standard library. </p>
    </div><br><br><br><br><br>
    <div class="details">
        <br>
        <h2>Course details:</h2>

        <p style="padding: 10%;"> Software version: 3.8.9<br>
            Course Duration: 48 hours.<br>
            Previous Language requirements: C/C++(not mandatory)<br>
            Assignments: To be uploaded in the link given by the instructor.<br>
            Preferred IDE: IDLE.<br></p>
    </div><br><br><br><br><br>
    <div class="instr">
        <div class="instra">
            <br>
            <h2 style="text-align: center; font-size:1.75em;">Faculties:</h2><br><br>
            <div class="instr1">
                <img src="https://sc01.alicdn.com/kf/H3beb4a5aca3d4c57adea6c3dc0a6be97d/200605461/H3beb4a5aca3d4c57adea6c3dc0a6be97d.png_.webp"
                    alt="Professor X" id="prof1" alt="Professor X">
                <p style="color:white;">Professor X dedicates his study entirely in Web Development. He has helped
                    many in leaning the full Web Developer Bootcamp. Click image to view profile.</p>
            </div><br>
            <div class="instr2">

                <img src="https://di2ponv0v5otw.cloudfront.net/posts/2020/10/05/5f7ba48cce5f1cc4ba989172/m_5f7ba48cce5f1cc4ba989173.jpeg"
                    alt="Professor Y" id="prof2" alt="Professor Y">
                <p style="color: white;">Professor Y is a young instructor, fresh from her college days, who has
                    completed
                    the entire Bootcamp and has taught many students till date. Click image to view profile.</p>
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
        $query3 = "select * from usercourse where username = '$user' and Course = 'python';";
        $result3 = mysqli_query($con,$query3);
        if(mysqli_num_rows($result3)==0){
            if($rows>='1'){
                echo "<form method='POST' style='text-align:center;'><input style='border: 1px solid black;width: 30%; margin: auto; border-radius: 5px;cursor:pointer;background-color: white; color: black; font-size: 30px' name='python' value='enroll python' type='submit'></form>";
            }
            if (isset($_POST['python'])){
                if ($_POST['python'] == 'enroll python') {
                    mysqli_query($con,"insert into usercourse(username,Course) values('$user','python')");
                    echo "<script>
                            alert('successfully enrolled!');
                            window.location.reload()
                        </script>";
                }
            }
        }
        else{
            echo "<center style='color:green;'>You have already enrolled this course</center>";
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