<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/html.css">
    <title>HTML|VCode</title>
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
        <h1>HyperText Markup Language(HTML)</h1>
        <br><br>
        <a href="https://en.wikipedia.org/wiki/HTML" target="_blank">
            <img src="https://hackr.io/tutorials/learn-html-5/logo/logo-html-5?ver=1587977020" id="html_img"></a>


        <p id="intro" style="padding: 5%;">The HyperText Markup Language, or HTML is the standard markup language for
            documents designed
            to
            be displayed in a web browser. Web browsers receive HTML documents from a web server or from local
            storage
            and render the documents into multimedia web pages. HTML describes the structure of a web page
            semantically
            and originally included cues for the appearance of the document.HTML elements are the building blocks of
            HTML
            pages. With HTML constructs, images and other objects such as interactive forms may be embedded into the
            rendered page. HTML provides a means to create structured documents by denoting structural semantics for
            text such as headings, paragraphs, lists, links, quotes and other items. HTML elements are delineated by
            tags, written using angle brackets. </p>
    </div><br><br><br><br><br>
    <div class="details">
        <br>
        <h2>Course details:</h2>

        <p style="padding: 10%;"> Software version: HTML5.<br>
            Course Duration: 61 hours.<br>
            Previous Language requirements: None.<br>
            Assignments: To be uploaded in the link given by the instructor.<br>
            Preferred IDE: Microsoft Visual Studio Code.<br></p>
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
    <center>
    <?php
        $con = mysqli_connect('localhost','root','');
        mysqli_select_db($con,'vcode');
        $result = mysqli_query($con,"select * from login where status = 1;");
        $rows = mysqli_num_rows($result);
        $user = mysqli_fetch_array($result)[1];
        $query3 = "select * from usercourse where username = '$user' and Course = 'html'";
        $result3 = mysqli_query($con,$query3);
        if(mysqli_num_rows($result3)==0){
            if($rows>='1'){
                echo "<form method='POST'><input style='border: 1px solid black;width: 30%; margin: auto; border-radius: 5px;cursor:pointer;background-color: white; color: black; font-size: 30px' name='html' value='enroll html' type='submit'></form>";
            }
            
            if (isset($_POST['html'])){
                if ($_POST['html'] == 'enroll html') {
                    mysqli_query($con,"insert into usercourse(username,Course) values('$user','html')");
                        echo "<script>
                            alert('successfully enrolled!');
                            window.location.reload()
                        </script>";
                }
            }
        } else{
            echo "<center style='color:green;'>You have already enrolled this course</center>";
        }
    ?><br>
    </center>
</body>
<footer>
    <div class="footer">
        <p><br>
            <marquee class="marquee">Contact us on Instagram: @vcodeind, LinkedIn and Facebook
            </marquee>
        </p>
</footer>

</html>