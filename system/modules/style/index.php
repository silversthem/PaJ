<?php 
/*
	-	STYLE
	-	By silversthem
	---------------------
	create a single css file
*/
header('Content-type:text/css');
$css = array();
$files = json::select('style/user.json','files');
$vars = json::select('style/user.json','vars');
foreach($files as $file)
{
	$tpl = new template('style/'.$file);
	$tpl->set($vars);
	echo $tpl->parse();
}
?>