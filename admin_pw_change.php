<?php
session_start();
require "database.php";

$pw=$_GET["pw"];

$q="UPDATE `admin` SET `admin_password`= '".$pw."' WHERE `admin_id`='".$_SESSION['admin']['admin_id']."' ";


 Dbms::iud($q);
$_SESSION["admin"]["admin_password"]=$pw;


?>
<script>
    window.location="admin_page.php";
</script>