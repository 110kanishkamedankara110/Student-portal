<?php

session_start();
$s=$_SESSION["subjects"];

echo json_encode($s);




?>