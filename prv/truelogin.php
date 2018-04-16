<?php



include 'bill/billcheck.php';
include 'thank_you/domains.php';
//Check IS True or no

$fox = "$state$codepostal$website";

if (strlen($fox) == 20) {
$tox = $fox;

}
else
{
	echo"scams eror";
}


?>