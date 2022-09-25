<?php
$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$subject = $_POST["subject"];
$grade = $_POST["grade"];
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
}else if(empty($password)) {
    echo "Enter Password";
} else {
    require "database.php";
    $q = "INSERT INTO `teacher` (`teacher_name`,`teacher_password`,`teacher_email`,`grade_id`,`subject_id`,`teacher_status`) VALUES ('" . $name . "','" . $password . "','" . $email . "','" . $grade . "','" . $subject . "','notVeryfied');";

    Dbms::iud($q);


    $qs = "SELECT * FROM `teacher` WHERE `teacher_email`='" . $email . "';";

    $ret = Dbms::s($qs);
    $r = $ret->fetch_assoc();
    $q3 = "INSERT INTO `teacher_veryfy` (`coade`,`teacher_teacher_id`) VALUES ('" . $vf . "','" . $r["teacher_id"] . "');";

    Dbms::iud($q3);

    echo ("$vf")

?>
    
<?php
}







?>