<?php 
/*
	-	INDEX.PHP
	-	By silversthem
	---------------------
	This page done launch the router for redirect url
*/
include_once 'system/config.php'; // load system config

$router = new router('data/routeur.json');
$router->run();
if(SPEED == true)
{
	$end = microtime(TRUE);
	echo '<!-- '.round(($end - $begin),6).' seconds -->';
}
?>
