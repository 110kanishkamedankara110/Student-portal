<?php




require "database.php";
$qsub = "SELECT * FROM `assignment` WHERE `assignment_id`='" . $_POST["ass_id"] . "';";

$ressub = Dbms::s($qsub);



$rsub = $ressub->fetch_assoc();





if ($rsub["assignment_marks_status"] == "Deactive") {
    $qu = "UPDATE `assignment` SET `assignment_marks_status`='Active' WHERE `assignment_id`='" . $_POST["ass_id"] . "';  ";
    Dbms::iud($qu);
} else {
    $qu = "UPDATE `assignment` SET `assignment_marks_status`='Deactive' WHERE `assignment_id`='" . $_POST["ass_id"] . "';  ";
    Dbms::iud($qu);
}
