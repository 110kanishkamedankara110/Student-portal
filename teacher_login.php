<?php

require "database.php";
session_start();

$email = $_POST["email"];
$password = $_POST["password"];


if (empty($email)) {
    echo "Enter Teacher Email";
} else if (empty($password)) {
    echo "Enter Teacher Password";
} else {


    $res = Dbms::s("SELECT * FROM `teacher` WHERE `teacher_email`='" . $email . "' AND `teacher_password`='" . $password . "'   ");
    $num = $res->num_rows;
    $r = $res->fetch_assoc();

    if ($num == 1) {
        if ($r["teacher_status"] == "notVeryfied") {
            echo "notvf";
        } else {
            $_SESSION["teacher"] = $r;

            echo "Sucess";
        }
    } else {
        echo "Invalid User Details";
    }
}
