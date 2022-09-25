<?php
require "database.php";
$email=$_POST["email"];
$coade=$_POST["coade"];
if (!empty($coade)) {
   
    $q="SELECT * FROM `student_veryfy` INNER JOIN `student` ON `student_veryfy`.`student_student_id`=`student`.`student_id` WHERE `student_email`='".$email."' AND `student_veryfy`.`coade`='".$coade."';";
    $res=Dbms::s($q);
    $nr=$res->num_rows;
    if ($nr==1) {
        $q2="UPDATE `student` SET `student_status`='Veryfied' WHERE `student_email`='".$email."';";
        Dbms::iud($q2);
        $r=$res->fetch_assoc();
        session_start();
        $_SESSION["student"] = $r;
        echo "sucess";
    } else {
        echo "Invalid Coade";
    }
}else{
    echo "Enter Coade";
}
?>