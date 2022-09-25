<?php
if (empty($_POST["title"])) {
    echo "Insert Title";
} else if (!isset($_FILES["fi"])) {
    echo "Choose File";
} else {
    session_start();
    $teacher = $_SESSION["teacher"]["teacher_id"];
    $tit = $_POST["title"];

    $tmp = $_FILES["fi"]["tmp_name"];
    $fn = $_FILES["fi"]["name"];

    $nnm = "Notes/" . uniqid() . $fn;

    require "database.php";
    require "date.php";

    $date = Date::getdate();


    $q = "INSERT INTO `lecture_notes` (`note_url`,`note_date`,`teacher_teacher_id`,`lesson`) VALUES ('" . $nnm . "','" . $date . "','" . $teacher . "','" . $tit . "');";
    Dbms::iud($q);

    move_uploaded_file($tmp, $nnm);
}
