<?php 
/*
	-	INDEX.PHP
	-	By silversthem
	---------------------
	general configuration
*/	
$begin = microtime(TRUE);
/*USER CONSTANTS*/
$config = json::open('data/config.json');
define('LOGIN',$config['login']); // the login for admin actions
define('PASSWORD',$config['password']); // the password for admin actions
define('LANG',$config['lang']);
define('BASE_URL',$config['root']); // If paj's data are not in the root dir
define('THEME',$config['theme']);
/*SYSTEM CONSTANTS*/
define('URL',preg_replace('#'.preg_quote(BASE_URL).'#','',$_SERVER['REQUEST_URI'])); // Url of the page
define('SPEED',false); // Print execution time
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