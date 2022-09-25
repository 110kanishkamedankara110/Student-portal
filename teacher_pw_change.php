<?php
session_start();
require "database.php";

$pw=$_GET["pw"];

$q="UPDATE `teacher` SET `teacher_password`= '".$pw."' WHERE `teacher_id`='".$_SESSION['teacher']['teacher_id']."' ";


 Dbms::iud($q);
$_SESSION["teacher"]["teacher_password"]=$pw;


?>
<script>
    window.location="teacher_page.php";
</script>