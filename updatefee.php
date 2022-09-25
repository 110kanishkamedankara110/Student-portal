<?php
require "database.php";
require "date.php";

$q="UPDATE `student` SET `student_fee_stat`='".$_POST["fee"]."' WHERE `student_id`='".$_POST["id"]."';";

Dbms::iud($q);

?>