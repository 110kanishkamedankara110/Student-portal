
<?php





use PHPMailer\PHPMailer\PHPMailer;



require "Exception.php";
require "PHPMailer.php";
require "SMTP.php";





$email = $_POST["em"];

$coade = $_POST["c"];
$password = $_POST["p"];

// echo $email;
// echo $password;
// echo $coade;

$mail = new PHPMailer;
$mail->IsSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'pixbin110@gmail.com';
$mail->Password = '';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
$mail->setFrom('pixbin110@gmail.com', 'kanishka');
$mail->addReplyTo('No Reply');
$mail->addAddress("$email");
$mail->isHTML(true);
$mail->Subject = 'Veryfy';
$bodyContent = "<h1 style='color:teal;'>Welcome To EdU Portal</h1>";
$bodyContent .= "<h3 style='color:black;'> Your Email : " . $email . "</h3>";
$bodyContent .= "<h3 style='color:black;'>Your Password : " . $password . "</h3>";
$bodyContent .= "<h3 style='color:black;'>Your Coade : " . $coade . "</h3>";



$mail->Body = $bodyContent;

if (!$mail->send()) {
echo "Mail Not Sent";
} else {
    echo "Mail Sent";
}



?>
