<?php


$s = ($_POST["sub"]);
$id = $_POST["id"];
$g = $_POST["grade"];


require "database.php";
require "date.php";


if ($s == "[]") {
    echo "Select a Subject";
} else {
    $su = json_decode($s);


    
    $date = Date::getpassDate();

    for ($i = 0; $i < count($su); $i++) {
        $subject = $su[$i][0];
        $teacher = $su[$i][1];

        $q = "SELECT * FROM `student_subject` WHERE `subject_id`='" . $subject . "' AND `student_id`='" . $id . "' AND `grade_grade_id`='" . $g . "' ;";
        $res = Dbms::s($q);
        $n = $res->num_rows;
        if ($n == 1) {
            $r = $res->fetch_assoc();
            $qa = "UPDATE `student_subject` SET `teacher_teacher_id`='" . $teacher . "' WHERE `s_subject_id`='" . $r["s_subject_id"] . "' AND `student_id`='" . $id . "' ;";

            Dbms::iud($qa);
        } else {
            $qi = "INSERT INTO `student_subject` (`subject_id`,`student_id`,`teacher_teacher_id`,`grade_grade_id`) VALUES('" . $subject . "','" . $id . "','" . $teacher . "','" . $g . "');";
            Dbms::iud($qi);
        }
        Dbms::iud("UPDATE `student` SET `grade_id`='" . $g . "' ,`trial_exp_date`='" . $date . "' WHERE `student_id`='" . $id . "';");
    }
}
