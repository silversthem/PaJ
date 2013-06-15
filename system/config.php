<?php 
/*
	-	INDEX.PHP
	-	By silversthem
	---------------------
	general configuration
*/	
$begin = microtime(TRUE);
/*USER CONSTANTS*/
define('LOGIN',''); // the login for admin actions
define('PASSWORD',''); // the password for admin actions
define('BASE_URL','/PaJ/Versions/0.1/'); // If paj's data are not in the root dir
/*SYSTEM CONSTANTS*/
define('URL',preg_replace('#'.preg_quote(BASE_URL).'#','',$_SERVER['REQUEST_URI'])); // Url of the page
/*AUTOLOAD*/
function __autoload($class) // autoload class
{
	if(file_exists('system/class/'.$class.'.class.php'))
	{
		include_once('system/class/'.$class.'.class.php');
	}
	else
	{
		die('Class '.$class.' : not found file');
	}
}
?>