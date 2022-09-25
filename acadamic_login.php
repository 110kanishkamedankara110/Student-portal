<?php

require "database.php";
session_start();

$email = $_POST["email"];
$password = $_POST["password"];


if (empty($email)) {
    echo "Enter Acadamic Email";
} else if (empty($password)) {
    echo "Enter Acadamic Password";
} else {


    $res = Dbms::s("SELECT * FROM `acadamic` WHERE `acadamic_email`='" . $email . "' AND `acadamic_password`='" . $password . "'   ");
    $num = $res->num_rows;
    $r = $res->fetch_assoc();

    if ($num == 1) {
        if ($r["acadamic_status"] == "notVeryfied") {
            echo "notvf";
        } else {
            $_SESSION["acadamic"] = $r;

            echo "Sucess";
        }
    } else {
        echo "Invalid User Details";
    }
}
