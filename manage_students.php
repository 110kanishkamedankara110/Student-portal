<?php
session_start();
require "database.php";
$no_of_stu = (Dbms::s("SELECT * FROM `student` WHERE `student_status`='Veryfied' "))->num_rows;



$stp;





$no_of_stu_al = (Dbms::s("SELECT * FROM `student` "))->num_rows;

if ($no_of_stu_al != 0) {

    $nvsp = (($no_of_stu_al - $no_of_stu) / $no_of_stu_al) * 100;
} else {
    $nvsp = 0;
}



if (isset($_SESSION["admin"]) || isset($_SESSION["acadamic"])) {
?>
    <!DOCTYPE html>
    <html>

    <head>


        <?php if (isset($_SESSION["acadamic"])) {
        ?>
            <title>Acadamic | Manage Students</title>
        <?php
        } else {
        ?>
            <title>Admin | Manage Students</title>
        <?php
        }

        ?>
        <link rel="stylesheet" href="style.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body style="box-sizing: border-box; background-repeat: no-repeat; background-size: cover;background-attachment: fixed;background-image: url('images/school.jpg');">

        <?php
        require "popup.php";
        ?>

        <!-- <div class="more-but" id="menu-but" onclick="showMenu();">

        </div> -->
        <div class="more-but" style="left: 5px;background-image: url('images/arrow.svg');" id="back-but" onclick="window.location='admin_page.php'">

        </div> 
        <!-- <div class="more" id="menu">
            <div style="margin-left: 100px;text-align: center;" id="men">
                <h1>Menu</h1>
                <p style="text-align:start;">Admin : <?php echo $_SESSION["admin"]["admin_name"] ?></p>

                <button class="b" style="background-color: rgba(5, 147, 255, 0.759);color: white;" onclick="document.getElementById('popup').style.display='grid'">Edit Profile</button>

                <button class="b" style="background-color: tomato;color:white" onclick="window.location='admin_logout.php'">Logout</button>

            </div>
        </div> --> 





        <div class="admin-page">

            <div class="manage" style="height:100%;margin-top: 0;">
                <div class="mn-i" style="background-image: url('images/student.svg');">

                </div>
                <div class="mn-d">
                    <h1>Student</h1>
                    <hr />
                    <h4>Veryfied Students : <?php echo $no_of_stu ?> </h4>
                    <h4>All Students : <?php echo $no_of_stu_al ?></h4>
                    <hr />
                    <h4>Not Veryfied : <?php echo $nvsp . "%" ?></h4>
                    <div class="pi" style="margin-bottom: 20px;background-image: conic-gradient( teal 0 <?php echo $nvsp . "%" ?>,rgba(255, 255, 255, 0.846) <?php echo $nvsp . "%" ?>);">

                    </div>

                    <?php
                    if (isset($_SESSION["acadamic"])) {
                    ?>
                        <button class="b" onclick="document.getElementById('student_reg').style='display:grid;' ">Register Student</button>

                    <?php
                    }

                    ?>
                </div>
            </div>



            <?php
            $q = "SELECT * FROM `student`INNER JOIN `grade` ON `student`.`grade_id`=`grade`.`grade_id`;";
            $res = Dbms::s($q);
            $n = $res->num_rows;

            ?>

            <div class="content" style="display: block;box-sizing: border-box;">

                <div class="stc">
                    <?php
                    for ($i = 0; $i < $n; $i++) {
                        $r = $res->fetch_assoc();
                        $qs = "SELECT * FROM `student_subject` INNER JOIN `subject` ON `student_subject`.`subject_id`=`subject`.`subject_id` WHERE `student_subject`.`student_id`='" . $r["student_id"] . "' AND `student_subject`.`grade_grade_id`='".$r["grade_id"]."';";
                        $sres = Dbms::s($qs);
                        $nss = $sres->num_rows;


                    ?>
                        <?php
                        if ($r["student_fee_stat"] == "expired") {
                        ?>
                            <div class="stu" style="border:solid tomato;box-sizing: border-box;">
                                <?php
                                if ($r["student_status"] == "Veryfied") {
                                ?>
                                    <div class="vf-stat"></div>
                                <?php
                                } else {

                                ?>
                                    <div class="nvf-stat"></div>
                                <?php
                                }
                                ?>

                                <h1 style="text-align: center;"><?php echo $r["student_name"] ?></h1>
                                <h3 style="margin: 5px;text-align: center;">Grade : <?php echo $r["grade"] ?></h3>
                                <h3 style="margin: 5px;text-align: center;">Email : <?php echo $r["student_email"] ?></h3>
                                <h3 style="margin: 5px;text-align: center;">Registered Date : <?php echo $r["student_reg_date"] ?></h3>
                                <h3 style="margin: 5px;text-align: center;">Trial Exp Date : <?php echo $r["trial_exp_date"] ?></h3>
                                <h3 style="margin: 5px;text-align: center;">Fee : <?php echo $r["student_fee_stat"] ?></h3>
                                <h3 style="margin: 5px;text-align: center;">Subjects : <?php for ($s = 0; $s < $nss; $s++) {
                                                                                            $ress = $sres->fetch_assoc();
                                                                                            echo $ress["subject"];
                                                                                            if ($s != ($nss - 1)) {
                                                                                                echo ",";
                                                                                            };
                                                                                        } ?></h3>

                                <button class="b" style="width: 100%;margin-top: 10px;margin-bottom: 10px;" onclick="window.location='student_info.php?id=<?php echo $r['student_id']; ?>'">Details</button>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="stu">
                                <?php
                                if ($r["student_status"] == "Veryfied") {
                                ?>
                                    <div class="vf-stat"></div>
                                <?php
                                } else {
                                ?>
                                    <div class="nvf-stat"></div>
                                <?php
                                } ?>

                                <h1 style="text-align: center;"><?php echo $r["student_name"] ?></h1>
                                <h3 style="margin: 5px;text-align: center;">Grade : <?php echo $r["grade"] ?></h3>
                                <h3 style="margin: 5px;text-align: center;">Email : <?php echo $r["student_email"] ?></h3>
                                <h3 style="margin: 5px;text-align: center;">Registered Date : <?php echo $r["student_reg_date"] ?></h3>
                                <h3 style="margin: 5px;text-align: center;">Trial Exp Date : <?php echo $r["trial_exp_date"] ?></h3>
                                <h3 style="margin: 5px;text-align: center;">Fee : <?php echo $r["student_fee_stat"] ?></h3>
                                <h3 style="margin: 5px;text-align: center;">Subjects : <?php for ($s = 0; $s < $nss; $s++) {
                                                                                            $ress = $sres->fetch_assoc();
                                                                                            echo $ress["subject"];
                                                                                            if ($s != ($nss - 1)) {
                                                                                                echo ",";
                                                                                            };
                                                                                        } ?></h3>

                                <button class="b" style="width: 100%;margin-top: 10px;margin-bottom: 10px;" onclick="window.location='student_info.php?id=<?php echo $r['student_id']; ?>'">Details</button>
                            </div>

                    <?php
                        }
                    }
                    ?>
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