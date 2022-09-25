<?php
require "database.php";
$email=$_POST["email"];
$coade=$_POST["coade"];
if (!empty($coade)) {
   
    $q="SELECT * FROM `teacher_veryfy` INNER JOIN `teacher` ON `teacher_veryfy`.`teacher_teacher_id`=`teacher`.`teacher_id` WHERE `teacher_email`='".$email."' AND `teacher_veryfy`.`coade`='".$coade."';";
    $res=Dbms::s($q);
    $nr=$res->num_rows;
    if ($nr==1) {
        $q2="UPDATE `teacher` SET `teacher_status`='Veryfied' WHERE `teacher_email`='".$email."';";
        Dbms::iud($q2);
        $r=$res->fetch_assoc();
        session_start();
        $_SESSION["teacher"] = $r;
        echo "sucess";
    } else {
        echo "Invalid Coade";
    }
}else{
    echo "Enter Coade";
}
?>