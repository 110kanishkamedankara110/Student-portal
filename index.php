<?php
session_start();

if(isset($_SESSION["admin"])){
    ?>
    <script>
        window.location="admin_page.php";
    </script>
    <?php
}else if(isset($_SESSION["student"])){
    ?>
    <script>
        window.location="student_page.php";
    </script>
    <?php

}else if(isset($_SESSION["acadamic"])){
    ?>
    <script>
        window.location="acadamic_page.php";
    </script>
    <?php

    
}else if(isset($_SESSION["teacher"])){
    ?>
    <script>
        window.location="teacher_page.php";
    </script>
    <?php

    
}else{
    ?>



<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <link rel="stylesheet" href="style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body style="box-sizing: border-box; background-repeat: no-repeat; background-size: cover;background-attachment: fixed;background-image: url('images/school.jpg');">
<?php
require "database.php";
require "popup2.php";
require "popup3.php";
require "popup4.php";

?>    
<div class="md">
        <div class="mld1">
            
            <div class="student" id="student">
                <h1 style="color: white;">Student</h1>

                <input type="text" class="inp" id="student_email" placeholder="Email" />
                <input type="password" class="inp" id="student_password" placeholder="Password" style="margin-bottom: 20px;"/></br>

                <p style="background-color:tomato;color:white;text-align: center;font-size: 15px;" id="student-error"></p>


                <button class="log_b" onclick="student_login();">LogIn</button>
            </div>
            <div class="admin" id="admin">
                <h1 style="color: white;">Admin</h1>

                <input type="text" id="admin_email" class="inp" placeholder="Admin Email" />
                <input type="password" class="inp" id="admin_password" placeholder="Password" style="margin-bottom: 20px;"/></br>

                <p style="background-color:tomato;color:white;text-align: center;font-size: 15px;" id="admin-error"></p>

                <button class="log_b" onclick="admin_login();">LogIn</button>
            </div>
            <div class="academic" id="academic">
                <h1 style="color: white;">Academic</h1>

                <input type="text" id="acadamic_email" class="inp" placeholder="User Name" />
                <input type="password" id="acadamic_password" class="inp" placeholder="Password" style="margin-bottom: 20px;"/></br>

                <p style="background-color:tomato;color:white;text-align: center;font-size: 15px;" id="acadamic-error"></p>


                <button class="log_b" onclick="acadamic_login();">LogIn</button>
            </div>
            <div class="teacher" id="teacher">
                <h1 style="color: white;">Teacher</h1>

                <input type="text" class="inp" id="teacher_email" placeholder="User Email" />
                <input type="password" class="inp" id="teacher_password" placeholder="Password" style="margin-bottom: 20px;"/></br>

                <p style="background-color:tomato;color:white;text-align: center;font-size: 15px;" id="teacher-error"></p>


                <button class="log_b"  onclick="teacher_login();">LogIn</button>
            </div>






        </div>
        <div class="mrd">
            <div class="lc" onclick="show('admin');" id="ad">
                <div class="login-cards" style="background-image: url('images/admin.svg');">

                </div>
                <h3 class="sp1">Admin</h3>
            </div>

            <div class="lc" onclick="show('academic');" id="ac">
                <div class="login-cards" style="background-image: url('images/academic.svg');">

                </div>
                <h3 class="sp1">Academic</h3>
            </div>

            <div class="lc" onclick="show('teacher');" id="te">
                <div class="login-cards" style="background-image: url('images/teacher.svg');">

                </div>
                <h3 class="sp1">Teacher</h3>
            </div>

            <div class="lc" onclick="show('student');" id="st">
                <div class="login-cards" style="background-image: url('images/student.svg');">

                </div>
                <h3 class="sp1">Student</h3>
            </div>

        </div>
    </div>




























    <script src="script.js"></script>
</body>

</html>

<?php
}
?>