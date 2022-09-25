<?php
$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];

$vf = rand(1000, 9999);

// echo $name;
// echo $email;
// echo $password;
// echo $subject;
// echo $grade;

if (empty($name)) {
    echo "Enter_name";
} else if (empty($email)) {
    echo "Enter Email";
} else if (!(str_ends_with($email, "@gmail.com") || str_ends_with($email, "@email.com"))) {
    echo "Invalid Email";
} else if(empty($password)) {
    echo "Enter Password";
}else{
    require "database.php";
    $q = "INSERT INTO `acadamic` (`acadamic_name`,`acadamic_password`,`acadamic_email`,`acadamic_status`) VALUES ('" . $name . "','" . $password . "','" . $email . "','notVeryfied');";

    Dbms::iud($q);


    $qs = "SELECT * FROM `acadamic` WHERE `acadamic_email`='" . $email . "';";

    $ret = Dbms::s($qs);
    $r = $ret->fetch_assoc();
    $q3 = "INSERT INTO `academin_veryfy` (`coade`,`acadamic_acadamic_id`) VALUES ('" . $vf . "','" . $r["acadamic_id"] . "');";

    Dbms::iud($q3);

    echo ("$vf")

?>
    
<?php
}







?>