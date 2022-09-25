<?php

require "database.php";
session_start();

$email = $_POST["email"];
$password = $_POST["password"];


if (empty($email)) {
    echo "Enter Admin Email";
} else if (empty($password)) {
    echo "Enter Admin Password";
} else {


    $res = Dbms::s("SELECT * FROM `admin` WHERE `admin_email`='" . $email . "' AND `admin_password`='" . $password . "'   ");
    $num = $res->num_rows;
    if ($num == 1) {
      
        $_SESSION["admin"] = $res->fetch_assoc();

        echo "Sucess";
    } else {
        echo "Invalid User Details";
    }
}
