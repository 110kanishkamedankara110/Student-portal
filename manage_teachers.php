<?php
session_start();
require "database.php";

$no_of_tea = (Dbms::s("SELECT * FROM `teacher` WHERE `teacher_status`='Veryfied' "))->num_rows;




$tep;



$no_of_tea_al = (Dbms::s("SELECT * FROM `teacher` "))->num_rows;



if ($no_of_tea_al != 0) {

    $nvtp = round((($no_of_tea_al - $no_of_tea) / $no_of_tea_al) * 100, 2);
} else {

    $nvtp = 0;
}



if (isset($_SESSION["admin"])) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Admin | Manage Teachers</title>
        <link rel="stylesheet" href="style.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body style="box-sizing: border-box; background-repeat: no-repeat; background-size: cover;background-attachment: fixed;background-image: url('images/school.jpg');">

        <?php
        require "popup.php";
        ?>

        <div class="more-but" id="menu-but" onclick="showMenu();">

        </div>
        <div class="more-but" style="left: 5px;background-image: url('images/arrow.svg');" id="back-but" onclick="window.location='admin_page.php'">

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



            <div class="manage" style="height:100%;margin-top: 0;">
                <div class="mn-i" style="background-image: url('images/teacher.svg');">

                </div>
                <div class="mn-d">
                    <h1>Teacher</h1>
                    <hr />
                    <h4>Veryfied Teachers : <?php echo $no_of_tea ?></h4>
                    <h4>All Teachers : <?php echo $no_of_tea_al ?></h4>
                    <hr />
                    <h4>Not Veryfied : <?php echo $nvtp . "%" ?></h4>
                    <div class="pi" style="margin-bottom: 20px; background-image: conic-gradient( tomato 0 <?php echo $nvtp . "%" ?>,rgba(255, 255, 255, 0.846) <?php echo $nvtp . "%" ?>);">

                    </div>
                    <button class="b" onclick="document.getElementById('teacher_reg').style.display='grid'">Register Teachers</button>
                </div>

            </div>

            <?php
            $q = "SELECT * FROM `teacher` INNER JOIN `subject` ON `teacher`.`subject_id`=`subject`.`subject_id` INNER JOIN `grade` ON `grade`.`grade_id`=`teacher`.`grade_id`;";

            $res = Dbms::s($q);
            $n = $res->num_rows;

            ?>
            <div class="content" style="display: block;box-sizing: border-box;">

                <div class="stc" style="grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));">
                    <?php
                    for ($i = 0; $i < $n; $i++) {
                        $r = $res->fetch_assoc();

                    ?>


                        <div class="stu" style="height: 400px;" >
                            <?php
                            if ($r["teacher_status"] == "Veryfied") {
                            ?>
                                <div class="vf-stat"></div>
                            <?php
                            } else {

                            ?>
                                <div class="nvf-stat"></div>
                            <?php
                            }
                            ?>

                            <h1 style="text-align: center;"><?php echo $r["teacher_name"] ?></h1>
                            <h3 style="margin: 5px;text-align: center;">Grade : <?php echo $r["grade"] ?></h3>
                            <h3 style="margin: 5px;text-align: center;">Email : <?php echo $r["teacher_email"] ?></h3>

                            <h3 style="margin: 5px;text-align: center;">Status : <?php echo $r["teacher_status"] ?></h3>
                            <h3 style="margin: 5px;text-align: center;">Subject: <?php echo $r["subject"] ?> </h3>
                            

                            <!-- <button class="b" style="width: 100%;margin-top: 10px;margin-bottom: 10px;" onclick="window.location='student_info.php?id=<?php echo $r['teacher_id']; ?>'">Details</button> -->
                        </div>


                    <?php
                    }
                    ?>
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