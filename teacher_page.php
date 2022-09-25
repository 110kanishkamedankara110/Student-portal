<?php
session_start();
require "database.php";


$noof_as_vf = (Dbms::s("SELECT * FROM `assignment` WHERE `assignment_marks_status`='Veryfied' AND `teacher_id`='" . $_SESSION["teacher"]["teacher_id"] . "'  "))->num_rows;








$noof_as_al = (Dbms::s("SELECT * FROM `assignment` WHERE `teacher_id`='" . $_SESSION["teacher"]["teacher_id"] . "'"))->num_rows;
$ts = Dbms::s("SELECT * FROM `teacher` INNER JOIN `subject` ON `subject`.`subject_id`=`teacher`.`subject_id` WHERE `teacher_id`='" . $_SESSION["teacher"]["teacher_id"] . "';");

$su = $ts->fetch_assoc();

if ($noof_as_al != 0) {

    $nvacd = round((($noof_as_al - $noof_as_vf) / $noof_as_al) * 100, 2);
} else {

    $nvacd = 0;
}


if (isset($_SESSION["teacher"])) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Teacher | <?php echo $_SESSION['teacher']["teacher_name"] ?></title>
        <link rel="stylesheet" href="style.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body style="box-sizing: border-box; background-repeat: no-repeat; background-size: cover;background-attachment: fixed;background-image: url('images/school.jpg');">

        <?php
        // require "popup.php";
        require "lecture_notes.php";
        require "edi_te.php";
        ?>

        <div class="more-but" id="menu-but" onclick="showMenu();">

        </div>
        <div class="more" id="menu">
            <div style="margin-left: 100px;text-align: center;" id="men">
                <h1>Menu</h1>
                <p style="text-align:start;">Teacher : <?php echo $_SESSION["teacher"]["teacher_name"] ?></p>

                <button class="b" style="background-color: rgba(5, 147, 255, 0.759);color: white;" onclick="document.getElementById('edit_te').style.display='grid'">Edit Profile</button>

                <button class="b" style="background-color: tomato;color:white" onclick="window.location='admin_logout.php'">Logout</button>

            </div>
        </div>





        <div class="admin-page">
            <div class="menu" >
                <div class="menu" style="background-color: rgba(255, 255, 255, 0.267);">
                    <h1>Teacher</h1>

                    <div class="manage-card">

                    </div>
                    <div class="manage-card">

                    </div>
                    <div class="manage-card">

                    </div>
                    <div class="pichart" style="display: inline-block;">

                    </div>


                    <div class="mn-i" style="background-image: url('images/assignment.svg');width:200px;height: 200px;display: inline-block;">

                    </div>

                    <hr />
                    <h4>Subject : <?php ?><?php echo $su["subject"] ?></h4>
                    <h4>Teacher : <?php ?><?php echo $_SESSION["teacher"]["teacher_name"] ?></h4>

                    <h1 style="margin-top: 10px;">Assignments Marks</h1>
                    <hr />
                    <h4>Veryfied Assignments Marks : <?php echo $noof_as_vf ?></h4>
                    <h4>All Assignments Marks : <?php echo $noof_as_al ?></h4>
                    <hr />
                    <h4>Not Veryfied <?php echo $nvacd . "%" ?></h4>
                    <div class="pi" style=" background-image: conic-gradient( rgba(5, 147, 255, 0.759) 0 <?php echo $nvacd . "%" ?>,rgba(255, 255, 255, 0.846) <?php echo $nvacd . "%" ?>);">

                    </div>

                    <button class="b" style="margin-top: 10px;" onclick="document.getElementById('notes_up').style.display='grid';">Upload Notes</button>
                    <button class="b" onclick="window.location='assignments.php';">Manage Assignments</button>





                </div>
            </div>
            <div class="content" style="display: block;box-sizing: border-box;">


                <div class="stc" style="grid-template-rows: repeat(auto-fit,300px);">
                    <?php
                    $qsub = "SELECT * FROM `lecture_notes` WHERE `teacher_teacher_id`='".$_SESSION["teacher"]["teacher_id"]."';";
                   
                    $ressub = Dbms::s($qsub);
                    $nsub = $ressub->num_rows;

                    for ($i = 0; $i < $nsub; $i++) {
                        $rsub = $ressub->fetch_assoc();
                      
                    ?>
                        <div class="sub">


                            <h1 style="text-align: center;"><?php echo "Lesson : " .$rsub["lesson"] ?></h1>
                            
                   
                            
                            <h3 style="margin: 2px;text-align: center;"><?php echo "Date : " .$rsub["note_date"] ?></h3>
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