<?php


$s = ($_POST["sub"]);
$n = $_POST["name"];
$e = $_POST["email"];
$p = $_POST["password"];
$g = $_POST["grade"];
$vf = rand(1000, 9999);

require "database.php";
require "date.php";

if (empty($n)) {
    echo "Enter Name";
} else if (empty($e)) {
    echo "Enter Email";
} else if (!(str_ends_with($e, "@gmail.com") || str_ends_with($e, "@email.com"))) {
    echo "Invalid Email";
} else if (empty($p)) {
    echo "Enter Password";
} else if ($g == "") {
    echo "Select Grade  ";
} else if ($s == "[]") {
    echo "Select a Subject";
} else {
    $su = json_decode($s);
    $exp = Date::getExpDate();
    $date = Date::getdate();

    $q="INSERT INTO `student` (`student_name`,`student_reg_date`,`trial_exp_date`,`student_email`,`student_password`,`student_status`,`grade_id`,`student_fee_stat`)      
    VALUES ('".$n."','".$date."','".$exp."','".$e."','".$p."','notVeryfied','".$g."','trial');";

    Dbms::iud($q);

    $qs="SELECT * FROM `student` WHERE `student_email`='".$e."';";
    $r=Dbms::s($qs);
    $res=$r->fetch_assoc();
$id=$res["student_id"];  
    $qiv="INSERT INTO `student_veryfy` (`student_student_id`,`coade`) VALUES('".$id."','".$vf."');";
    Dbms::iud($qiv);


    for ($i = 0; $i < count($su); $i++) {
        $subject = $su[$i][0];
        $teacher = $su[$i][1];
        $qs="INSERT INTO `student_subject` (`subject_id`,`student_id`,`teacher_teacher_id`,`grade_grade_id`) VALUES('".$subject."','".$id."','".$teacher."','".$g."');";

        Dbms::iud($qs);

    }
    echo ("$vf");
}
