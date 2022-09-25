<?php
require "database.php";
require "date.php";
$q="UPDATE `student` SET `grade_id`='".$_POST["grade"]."',`trial_exp_date`='".Date::getpassDate()."' WHERE `student_id`='".$_POST["id"]."' ;";
Dbms::iud($q);

?>