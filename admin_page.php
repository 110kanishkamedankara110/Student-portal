<?php
session_start();
require "database.php";
$no_of_stu = (Dbms::s("SELECT * FROM `student` WHERE `student_status`='Veryfied' "))->num_rows;
$no_of_tea = (Dbms::s("SELECT * FROM `teacher` WHERE `teacher_status`='Veryfied' "))->num_rows;
$no_of_aca = (Dbms::s("SELECT * FROM `acadamic` WHERE `acadamic_status`='Veryfied' "))->num_rows;

$all = $no_of_stu + $no_of_tea + $no_of_aca;
$stp;
$tep;
$acp;
if ($all != 0) {
    $stp = round(($no_of_stu / $all) * 100, 2);
    $tep = round(($no_of_tea / $all) * 100, 2);
    $acp = round(($no_of_aca / $all) * 100, 2);
} else {
    $stp = 0;
    $tep = 0;
    $acp = 0;
}

// $stp=10;
// $tep=30;
// $acp=60;


$no_of_stu_al = (Dbms::s("SELECT * FROM `student` "))->num_rows;
$no_of_tea_al = (Dbms::s("SELECT * FROM `teacher` "))->num_rows;
$no_of_aca_al = (Dbms::s("SELECT * FROM `acadamic` "))->num_rows;

if ($no_of_stu_al != 0) {

    $nvsp = round((($no_of_stu_al - $no_of_stu) / $no_of_stu_al) * 100, 2);
} else {
    $nvsp = 0;
}
if ($no_of_tea_al != 0) {

    $nvtp = round((($no_of_tea_al - $no_of_tea) / $no_of_tea_al) * 100, 2);
} else {

    $nvtp = 0;
}
if ($no_of_aca_al != 0) {

    $nvap = round((($no_of_aca_al - $no_of_aca) / $no_of_aca_al) * 100, 2);
} else {

    $nvap = 0;
}


if (isset($_SESSION["admin"])) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Admin | <?php echo $_SESSION['admin']["admin_name"] ?></title>
        <link rel="stylesheet" href="style.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body style="box-sizing: border-box; background-repeat: no-repeat; background-size: cover;background-attachment: fixed;background-image: url('images/school.jpg');">

        <?php
        require "popup.php";
        ?>

        <div class="more-but" id="menu-but" onclick="showMenu();">

        </div>
        <div class="more" id="menu">
            <div style="margin-left: 100px;text-align: center;" id="men">
                <h1>Menu</h1>
                <p style="text-align:start;">Admin : <?php echo $_SESSION["admin"]["admin_name"] ?></p>

                <button class="b" style="background-color: rgba(5, 147, 255, 0.759);color: white;" onclick="document.getElementById('popup').style.display='grid'">Edit Profile</button>

                <button class="b" style="background-color: tomato;color:white" onclick="window.location='admin_logout.php'">Logout</button>

            </div>
        </div>





        <div class="admin-page">
            <div class="menu">
                <h1>Admin Pannel</h1>

                <div class="manage-card">

                </div>
                <div class="manage-card">

                </div>
                <div class="manage-card">

                </div>
                <div class="pichart" style="display: inline-block;">
                    <div class="u-pi" style="background-image: conic-gradient( teal 0 <?php echo $stp . "%" ?> ,tomato <?php echo $stp . "%" ?>  <?php echo $stp + $tep . "%" ?> ,rgba(5, 147, 255, 0.759) <?php echo $stp + $tep . "%" ?>  <?php echo $stp + $tep + $acp . "%" ?> );">

                    </div>
                    <div class="key">
                        <div style="width: 20px;height: 20px;background-color: teal;display: inline-block;"></div>
                        <h3 style="display: inline-block;margin-left:10px;">Students : <?php echo $stp . "%" ?></h3><br />
                        <div style="width: 20px;height: 20px;background-color: tomato;display: inline-block;"></div>
                        <h3 style="display: inline-block;margin-left:10px;">Teachers : <?php echo $tep . "%" ?></h3><br />
                        <div style="width: 20px;height: 20px;background-color: rgba(5, 147, 255, 0.759);display: inline-block;"></div>
                        <h3 style="display: inline-block;margin-left:10px;">Acadamics : <?php echo $acp . "%" ?></h3><br />
                    </div>
                </div>
                <button class="b" onclick="window.location='manage_students.php'">Manage Students</button>
                <button class="b" onclick="window.location='manage_teachers.php'">Manage Teachers</button>
                <button class="b" onclick="window.location='manage_acadamics.php'">Manage Acadamics</button>




            </div>
            <div class="content">
                <div class="manage">
                    <div class="mn-i" style="background-image: url('images/student.svg');">

                    </div>
                    <div class="mn-d">
                        <h1>Student</h1>
                        <hr />
                        <h4>Veryfied Students : <?php echo $no_of_stu ?> </h4>
                        <h4>All Students : <?php echo $no_of_stu_al ?></h4>
                        <hr />
                        <h4>Not Veryfied : <?php echo $nvsp . "%" ?></h4>
                        <div class="pi" style=" background-image: conic-gradient( teal 0 <?php echo $nvsp . "%" ?>,rgba(0,0,0,0) <?php echo $nvsp . "%" ?>);">
                            
                        </div>
                    </div>
                </div>
                <div class="manage">
                    <div class="mn-i" style="background-image: url('images/teacher.svg');">

                    </div>
                    <div class="mn-d">
                        <h1>Teacher</h1>
                        <hr />
                        <h4>Veryfied Teachers : <?php echo $no_of_tea ?></h4>
                        <h4>All Teachers : <?php echo $no_of_tea_al ?></h4>
                        <hr />
                        <h4>Not Veryfied : <?php echo $nvtp . "%" ?></h4>
                        <div class="pi" style=" background-image: conic-gradient( tomato 0 <?php echo $nvtp . "%" ?>,rgba(0,0,0,0) <?php echo $nvtp . "%" ?>);">
                           
                        </div>
                    </div>

                </div>
                <div class="manage">
                    <div class="mn-i" style="background-image: url('images/academic.svg');">

                    </div>
                    <div class="mn-d">
                        <h1>Acadamic</h1>
                        <hr />
                        <h4>Veryfied Acadamics : <?php echo $no_of_aca ?></h4>
                        <h4>All Acadamics : <?php echo $no_of_aca_al ?></h4>
                        <hr />
                        <h4>Not Veryfied <?php echo $nvap . "%" ?></h4>
                        <div class="pi" style=" background-image: conic-gradient( rgba(5, 147, 255, 0.759) 0 <?php echo $nvap . "%" ?>,rgba(0,0,0,0) <?php echo $nvap . "%" ?>);">
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>























        <script src="script.js"></script>
    </body>

    </html>
<?php
} else {
?>
    <script>
        window.location = "index.php";
    </script>
<?php
}
?>