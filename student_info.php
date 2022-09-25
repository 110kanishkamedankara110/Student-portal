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
            <title>Acadamic | Students Info</title>
        <?php
        } else {
        ?>
            <title>Admin | Students Info</title>
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

        <div class="more-but" id="menu-but" onclick="showMenu();">

        </div>
        <div class="more-but" style="left: 5px;background-image: url('images/arrow.svg');" id="back-but" onclick="window.location='manage_students.php'">

        </div>
        <div class="more" id="menu">
            <div style="margin-left: 100px;text-align: center;" id="men">
                <h1>Menu</h1>
                <p style="text-align:start;">Admin : <?php echo $_SESSION["admin"]["admin_name"] ?></p>

                <button class="b" style="background-color: rgba(5, 147, 255, 0.759);color: white;" onclick="document.getElementById('popup').style.display='grid'">Edit Profile</button>

                <button class="b" style="background-color: tomato;color:white" onclick="window.location='admin_logout.php'">Logout</button>

            </div>
        </div>


        <?php
        $q = "SELECT * FROM `student`INNER JOIN `grade` ON `student`.`grade_id`=`grade`.`grade_id` WHERE `student_id`='" . $_GET["id"] . "';";
        $res = Dbms::s($q);
        $n = $res->num_rows;
        $r = $res->fetch_assoc();
        $qs = "SELECT * FROM `student_subject` INNER JOIN `subject` ON `student_subject`.`subject_id`=`subject`.`subject_id` WHERE `student_subject`.`student_id`='" . $r["student_id"] . "' AND `student_subject`.`grade_grade_id`='".$r["grade_id"]."';";
        $sres = Dbms::s($qs);
        $nss = $sres->num_rows;

        $qg = "SELECT* FROM `grade`;";
        $resg = Dbms::s($qg);
        $ng = $resg->num_rows;

        ?>


        <div class="admin-page">

            <div class="manage" style="height:100%;margin-top: 0;<?php if ($r["student_fee_stat"] == "expired") {
                                                                        echo "border:solid tomato";
                                                                    } ?>">
                <div class="mn-i" style="background-image: url('images/student.svg');">

                </div>
                <div class="mn-d">
                    <h1><?php echo $r["student_name"] ?></h1>
                    <hr />
                    <h4 style="display: inline-block;">Grade :
                        <select id="gr" <?php if (isset($_SESSION["acadamic"])) {
                                            echo "disabled";
                                        } ?>>

                            <?php
                            for ($i = 0; $i < $ng; $i++) {
                                $rg = $resg->fetch_assoc();
                                if ($r["grade"] == $rg["grade"]) {
                            ?>
                                    <option selected value="<?php echo $rg['grade_id']; ?>">
                                        <?php echo $rg['grade']; ?>
                                    </option>
                                <?php
                                } else {
                                ?>
                                    <option value="<?php echo $rg['grade_id']; ?>">
                                        <?php echo $rg['grade']; ?>
                                    </option>
                                <?php
                                }
                                ?>
                            <?php
                            }
                            ?>

                        </select>
                    </h4>
                    <?php
                    if (!isset($_SESSION["acadamic"])) {
                    ?>
                        <button style="display: inline-block;margin-left: 10px;" onclick="up_stu_gra('<?php echo $_GET['id'] ?>')">Update</button>

                    <?php
                    }
                    ?>
                    <h4>Email : <?php echo $r["student_email"] ?></h4>
                    <h4>Registered Date : <?php echo $r["student_reg_date"] ?></h4>

                    <h4>Trial Exp Date : <?php echo $r["trial_exp_date"] ?></h4>
                    <h4 style="display: inline-block;">Fee :
                        <select id="fee" <?php if (isset($_SESSION["acadamic"])) {
                                                echo "disabled";
                                            } ?>>
                            <?php
                            if ($r["student_fee_stat"] == "trial") {
                            ?>
                                <option selected>trial</option>
                            <?php
                            } else {
                            ?>
                                <option>trial</option>
                            <?php
                            }
                            ?>
                            <?php
                            if ($r["student_fee_stat"] == "paid") {
                            ?>
                                <option selected>paid</option>
                            <?php
                            } else {
                            ?>
                                <option>paid</option>
                            <?php
                            }
                            ?>
                            <?php
                            if ($r["student_fee_stat"] == "expired") {
                            ?>
                                <option selected>expired</option>
                            <?php
                            } else {
                            ?>
                                <option>expired</option>
                            <?php
                            }
                            ?>

                        </select>
                    </h4>
                    <?php
                    if (!isset($_SESSION["acadamic"])) {
                    ?>
                        <button style="display: inline-block;margin-left: 10px;" onclick="up_stu_fee('<?php echo $_GET['id'] ?>')">Update</button>

                    <?php
                    }
                    ?>

                    <h4>Subjects : <?php for ($s = 0; $s < $nss; $s++) {
                                        $ress = $sres->fetch_assoc();
                                        echo $ress["subject"];
                                        if ($s != ($nss - 1)) {
                                            echo ",";
                                        };
                                    } ?></h4>
                    <hr />
                    <!-- <h4>Not Veryfied : <?php echo $nvsp . "%" ?></h4>
                    <div class="pi" style="margin-bottom: 20px;background-image: conic-gradient( teal 0 <?php echo $nvsp . "%" ?>,rgba(255, 255, 255, 0.846) <?php echo $nvsp . "%" ?>);">

                    </div> -->

                    <!-- <button class="b">Register Student</button> -->
                </div>
            </div>





            <div class="content" style="display: block;box-sizing: border-box;">


                <div class="stc" style="grid-template-rows: repeat(auto-fit,300px);">
                    <?php
                    $qsub = "SELECT * FROM `student_subject` INNER JOIN 
`student` ON `student`.`student_id`=`student_subject`.`student_id` INNER JOIN 
`subject` ON `subject`.`subject_id`=`student_subject`.`subject_id` WHERE `student`.`student_id`='" . $_GET['id'] . "' AND `student_subject`.`grade_grade_id`='".$r["grade_id"]."' ;";
                    $ressub = Dbms::s($qsub);
                    $nsub = $ressub->num_rows;

                    for ($i = 0; $i < $nsub; $i++) {
                        $rsub = $ressub->fetch_assoc();
                        $qt = "SELECT * FROM `teacher` WHERE `grade_id`='" . $rsub['grade_id'] . "' AND `subject_id`='" . $rsub['subject_id'] . "'; ";
                        $reste = Dbms::s($qt);
                        $rt = $reste->fetch_assoc();
                    ?>
                        <div class="sub">


                            <h1 style="text-align: center;"><?php echo $rsub["subject"] ?></h1>
                            <h3 style="margin: 2px;text-align: center;">Teacher : <?php echo $rt["teacher_name"] ?></h3>
                            <h3 style="margin: 2px;text-align: center;"></h3>
                            <h3 style="margin: 2px;text-align: center;"></h3>
                            <h3 style="margin: 2px;text-align: center;"></h3>
                            <h3 style="margin: 2px;text-align: center;"></h3>
                            <h3 style="margin: 2px;text-align: center;"></h3>

                            <!-- <button class="b" style="width: 100%;" onclick="window.location='student_info?id=<?php echo $r['student_id']; ?>'">Details</button> -->
                        </div>
                    <?php
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