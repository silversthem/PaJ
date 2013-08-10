<?php 
/*
	-	MODULE ADMIN
	-	By Silversthem
	---------------------
	This module load admin pages of modules
*/

session_start();

include_once("system/helper.function.php");

$lang = new lang('system/modules/admin/lang.json',LANG);

if(isset($_SESSION['admin']) && $_SESSION['admin'] == true)
{
	if(isset($_GET['page']))
	{
		if(file_exists('system/modules/'.$_GET['page'].'/admin.php'))
		{
			include_once('system/modules/'.$_GET['page'].'/admin.php');
		}
		else
		{
			echo $lang->read('404mod');
		}
	}
	else # home page
	{

	}
}
else
{
	if(IssetP('login','password'))
	{
		if($_POST['login'] == LOGIN && sha1($_POST['password']) == PASSWORD)
		{
			$_SESSION['admin'] = true;
			header('location:'.URL);
		}
		else
		{
			echo 'nope !';
		}
	}
	$connect = new template('system/modules/admin/connect.tpl');
	$connect->set(array('LOGIN' => $lang->read('l'),'PASSWORD' => $lang->read('m'),'CONNECT' => $lang->read('c')));
	echo $connect->parse();
}
?>