<?php
if (empty($_POST["title"])) {
    echo "Insert Title";
} else if (!isset($_FILES["fi"])) {
    echo "Choose File";
} else if(empty($_POST["d"])){
    echo "Choose Date";
}else{
    session_start();
    $teacher = $_SESSION["teacher"]["teacher_id"];
    $tit = $_POST["title"];
    $d = $_POST["d"];
    $tmp = $_FILES["fi"]["tmp_name"];
    $fn = $_FILES["fi"]["name"];

    $nnm = "Assignments/" . uniqid() . $fn;

    require "database.php";
    require "date.php";

    $date = Date::getdate();


    $q = "INSERT INTO `assignment` (`assignment_date`,`deadline`,`teacher_id`,`assignment_link`,`assignment_marks_status`,`assignment_title`) 
    VALUES ('" . $date . "','" . $d . "','" . $teacher . "','" . $nnm . "','Deactive','".$tit."');";
    Dbms::iud($q);

    move_uploaded_file($tmp, $nnm);
    // echo($d);
}
