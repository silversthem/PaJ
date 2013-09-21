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
	ob_start();
	$menu = json::open('system/modules/admin/menus.json');
	# DEFINE TOP MENU
	$topnav = '<ul>';
	foreach($menu['top'] as $link)
	{
		$topnav .= '<li><a href="'.BASE_URL.$link['link'].'">';
		if(array_key_exists('icon',$link))
		{
			$topnav .= '<img src="'.$link['icon'].'" alt="'.$link['text'].'"/>';
		}
		else
		{
			$topnav .= $link['text'];
		}
		$topnav .= '</a></li>';
	}
	$topnav .= '</ul>';
	#DEFINE ASIDE MENU
	$asidenav = '';
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
		?>
		<h1>Welcome to your PaJ</h1>
		<p>Thanks you for using this dude, hopefully you'll love it.</p>
		<h2>Daily news</h2>
		<ul>
			<li>Not so many things</li>
			<li>Yeah, so great !</li>
		</ul>
		<h2>Bug repport</h2>
		<p>All is okay ;-)</p>
		<h2>Documentation</h2>
		<p><a href="#">wiki</a> <a href="#">documentation</a> <a href="#">how to use ?</a></p>
		<h3>Moar</h3>
		<p><a href="#">About the project</a> <a href="#">About the creator</a> <a href="#">Github</a> 
		<a href="#">Follow me!</a></p>
		<?php
	}
	$content = ob_get_clean();
	$main = new template('system/modules/admin/main.tpl');
	$main->set(array('CONTENT' => $content,'TOPNAV' => $topnav,'ASIDENAV' => $asidenav));
	echo $main->parse();
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
			echo ''.$lang->read('lolnope').'';
		}
	}
	$connect = new template('system/modules/admin/connect.tpl');
	$connect->set(array('LOGIN' => $lang->read('l'),'PASSWORD' => $lang->read('m'),'CONNECT' => $lang->read('c')));
	echo $connect->parse();
}
?>
