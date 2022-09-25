<?php
require "database.php";
$email=$_POST["email"];
$coade=$_POST["coade"];
if (!empty($coade)) {
   
    $q="SELECT * FROM `academin_veryfy` INNER JOIN `acadamic` ON `academin_veryfy`.`acadamic_acadamic_id`=`acadamic`.`acadamic_id` WHERE `acadamic_email`='".$email."' AND `academin_veryfy`.`coade`='".$coade."';";
    $res=Dbms::s($q);
    $nr=$res->num_rows;
    if ($nr==1) {
        $q2="UPDATE `acadamic` SET `acadamic_status`='Veryfied' WHERE `acadamic_email`='".$email."';";
        Dbms::iud($q2);
        $r=$res->fetch_assoc();
        session_start();
        $_SESSION["acadamic"] = $r;
        echo "sucess";
    } else {
        echo "Invalid Coade";
    }
}else{
    echo "Enter Coade";
}
?>