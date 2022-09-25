<?php

require "database.php";
require "date.php";
session_start();

$email = $_POST["email"];
$password = $_POST["password"];


if (empty($email)) {
    echo "Enter Teacher Email";
} else if (empty($password)) {
    echo "Enter Teacher Password";
} else {


    $res = Dbms::s("SELECT * FROM `student` WHERE `student_email`='" . $email . "' AND `student_password`='" . $password . "'   ");
    $num = $res->num_rows;
    $r = $res->fetch_assoc();

    if ($num == 1) {
        if ($r["student_status"] == "notVeryfied") {
            echo "notvf";
        }else if($r["trial_exp_date"]<Date::getdate()){
            Dbms::iud("UPDATE `student` SET `student_fee_stat` ='Expired' WHERE `student_id`='".$r["student_id"]."';");
            echo "exp";

        } 
        
        
        
        else {
            $_SESSION["student"] = $r;

            echo "Sucess";
        }
    } else {
        echo "Invalid User Details";
    }
}
