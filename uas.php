<?php
require "date.php";

 if (!isset($_FILES["fi"])) {
    echo "Choose File";
    echo  Date::getdate();
}else{
    session_start();
    $date =Date::getdate();
    $ass_id=$_POST["ass_id"];
    $stu_sub_id=$_POST["stu_sub-id"];

    $tmp = $_FILES["fi"]["tmp_name"];
    $fn = $_FILES["fi"]["name"];

    $nnm = "Asnwers/" . uniqid() . $fn;

    require "database.php";


    $date = Date::getdate();


    $q = "INSERT INTO `assignment_marks` (`date`,`assignment_id`,`marks`,`student_subject_s_subject_id`) 
    VALUES ('" . $date . "','" . $ass_id . "','Pending','" . $stu_sub_id . "');";
    Dbms::iud($q);

    move_uploaded_file($tmp, $nnm);
    // echo($d);
}
