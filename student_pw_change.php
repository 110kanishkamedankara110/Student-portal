<?php
session_start();
require "database.php";

$pw=$_GET["pw"];

$q="UPDATE `student` SET `student_password`= '".$pw."' WHERE `student_id`='".$_SESSION['student']['student_id']."' ";


 Dbms::iud($q);
$_SESSION["student"]["student_password"]=$pw;


?>
<script>
    window.location="student_page.php";
</script>