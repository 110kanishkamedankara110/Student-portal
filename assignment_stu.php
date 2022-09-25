<?php
session_start();
require "database.php";



$ssub = "SELECT * FROM `student_subject` 
                             INNER JOIN `student` ON `student`.`student_id`=`student_subject`.`student_id` 
                             INNER JOIN `subject` ON `student_subject`.`subject_id`=`subject`.`subject_id` 
                             INNER JOIN `teacher` ON `teacher`.`teacher_id`=`student_subject`.`teacher_teacher_id` 
                             INNER JOIN `grade` ON `student_subject`.`grade_grade_id`=`grade`.`grade_id` 
                             WHERE `student_subject`.`student_id`='" . $_SESSION["student"]["student_id"] . "' 
                             AND `student_subject`.`grade_grade_id`='" . $_SESSION["student"]["grade_id"] . "' 
                             AND `student_subject`.`subject_id`='" . $_GET["s"] . "';";



$sr = Dbms::s($ssub);
$ns = $sr->num_rows;
for ($i = 0; $i < $ns; $i++) {
    $re = $sr->fetch_assoc();
}
















if (isset($_SESSION["student"])) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Student | <?php echo $_SESSION['student']["student_name"] ?></title>
        <link rel="stylesheet" href="style.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body onload="till();" style="box-sizing: border-box; background-repeat: no-repeat; background-size: cover;background-attachment: fixed;background-image: url('images/school.jpg');">

        <?php

        require "edi_st.php";
        





        ?>
        

        <!-- <div class="more-but" id="menu-but" onclick="showMenu();">

        </div>
        <div class="more" id="menu">
            <div style="margin-left: 100px;text-align: center;" id="men">
                <h1>Menu</h1>
                <p style="text-align:start;">Student : <?php echo $_SESSION["student"]["student_name"] ?></p>

                <button class="b" style="background-color: rgba(5, 147, 255, 0.759);color: white;" onclick="document.getElementById('edit_st').style.display='grid'">Edit Profile</button>

                <button class="b" style="background-color: tomato;color:white" onclick="window.location='admin_logout.php'">Logout</button>

            </div>
        </div> -->





        <div class="admin-page">
            <div class="menu">
                <div class="menu" style="background-color: rgba(255, 255, 255, 0.267);">
                    <h1>Student</h1>

                    <div class="manage-card">

                    </div>
                    <div class="manage-card">

                    </div>
                    <div class="manage-card">

                    </div>
                    <div class="pichart" style="display: inline-block;">

                    </div>


                    <div class="mn-i" style="background-image: url('images/student.svg');width:200px;height: 200px;display: inline-block;">

                    </div>

                    <hr />
                    <h4>Subjects : <?php ?><?php echo $re["subject"] ?></h4>
                    <h4>Student : <?php ?><?php echo $_SESSION["student"]["student_name"] ?></h4>
                    <h4>Grade : <?php ?><?php echo $re["grade"] ?></h4>
                    <h4>Register Date : <?php ?><?php echo $_SESSION["student"]["student_reg_date"] ?></h4>
                    <?php

                    ?>
                    <h4>Expire Date : <?php ?><?php echo $_SESSION["student"]["trial_exp_date"] ?></h4>
                    <div id="till_date">

                    </div>
                    <!-- <h1 style="margin-top: 10px;">Assignments Marks</h1>
                    <hr />
                    <h4>Veryfied Assignments Marks : <?php echo $noof_as_vf ?></h4>
                    <h4>All Assignments Marks : <?php echo $noof_as_al ?></h4>
                    <hr />
                    <h4>Not Veryfied <?php echo $nvacd . "%" ?></h4>
                    <div class="pi" style=" background-image: conic-gradient( rgba(5, 147, 255, 0.759) 0 <?php echo $nvacd . "%" ?>,rgba(255, 255, 255, 0.846) <?php echo $nvacd . "%" ?>);">

                    </div> -->

                    <!-- <button class="b" style="margin-top: 10px;" onclick="">Assignments</button> -->
                    <!--<button class="b" onclick="window.location='assignments.php';">Manage Assignments</button> -->





                </div>
            </div>
            <div class="content" style="display: block;box-sizing: border-box;" id="con">


                <div class="stc" style="grid-template-rows: repeat(auto-fit,300px);">
                    <?php
                    $qsub = "SELECT * FROM `assignment` WHERE `teacher_id`='" . $re["teacher_id"] . "' ORDER BY `assignment_id` DESC ;";

                    $ressub = Dbms::s($qsub);
                    $nsub = $ressub->num_rows;

                    for ($i = 0; $i < $nsub; $i++) {
                        $rsub = $ressub->fetch_assoc();
                       $asm= $re["s_subject_id"];
                    ?>
                        <div class="sub">


                            <h1 style="text-align: center;"><?php echo "Assignment : " . $rsub["assignment_title"] ?></h1>




                            <h3 style="margin: 2px;text-align: center;"> <?php echo "Date : " . $rsub["assignment_date"] ?></h3>
                            <h3 style="margin: 2px;text-align: center;"> <?php echo "Deadline : " . $rsub["deadline"] ?></h3>
                            <h3 style="margin: 2px;text-align: center;"></h3>
                            <h3 style="margin: 2px;text-align: center;"></h3>
                            <?php
                            require "date.php";

                            if ($rsub['deadline'] < Date::onlydate()) {

                              
                            ?>
                                    <button class="b" style="width: 100%;">pending</button>
                                <?php
                              

                               
                            } else {
                                $as_m = "SELECT * FROM `assignment_marks` WHERE `assignment_id`='" . $rsub["assignment_id"] . "' AND `student_subject_s_subject_id`='" . $re['s_subject_id'] . "'; ";
                                $as_r = Dbms::s($as_m);
                                $as_nr = $as_r->num_rows;
                                if ($as_nr == 1) {
                                    $m=$as_r->fetch_assoc();
                                    if($rsub["assignment_marks_status"]=="Active"){
                                ?>
                                
                                    <button class="b" style="width: 100%;">Marks : <?php echo $m["marks"] ?></button>

                                <?php
                                    }else{
                                        ?>
                                        
                                
                                    <button class="b" style="width: 100%;">pending</button>

                            
                                        <?php
                                    }
                                } else {
                                ?>
                                    <a href="<?php echo $rsub['assignment_link'] ?>" download="<?php echo $rsub['assignment_link'] ?>"> <button class="b" style="width: 100%;">Download</button></a>
                                    <button class="b" style="width: 100%;" onclick="document.getElementById('ass_up_stu').style.display='grid';">Upload Answers</button>
                            <?php
                                }
                            }


                            ?>

                        </div>
                    <?php
                    }
                    ?>



                </div>





            </div>


        </div>


        </div>


        <div class="popup-body" id="ass_up_stu">
    <div class="admin-edit-pop">
        <div class="dd">
            <div class="cd">
                <div class="close" onclick="document.getElementById('ass_up_stu').style.display='none';">

                </div>
            </div></br>
            <div class="pop-det" style="text-align: center;">
                <h2 style="text-align: center;">Upload Assignments</h2>


                <input type="file" id="ass_file" style="display: none;" /><br /><br />
                <label for="ass_file" style="margin-top: 10px;background-color:blue;color: white;padding: 10px;box-sizing: border-box;border-radius: 10px">Choose File</label>




                <p id="se" style="background-color: tomato;color:white;text-align: center;"></p>

                <button class="b" style="width: 100%;margin-top: 10px;margin-bottom: 10px;background-color:teal;color:white; " onclick="up_ass_stu('<?php echo $rsub['assignment_id']?>','<?php echo $asm ?>');">Upload</button>


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