<?php
session_start();
require "database.php";

$pw=$_GET["pw"];

$q="UPDATE `acadamic` SET `acadamic_password`= '".$pw."' WHERE `acadamic_id`='".$_SESSION['acadamic']['acadamic_id']."' ";


 Dbms::iud($q);
$_SESSION["acadamic"]["acadamic_password"]=$pw;


?>
<script>
    window.location="acadamic_page.php";
</script>