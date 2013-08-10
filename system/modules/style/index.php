<?php 
/*
	-	STYLE
	-	By silversthem
	---------------------
	create a single css file
*/
header('Content-type:text/css');

$conf = json::open('style/'.THEME.'/theme.json');
$vars = json::select('style/user.json','vars');
if(!isset($_GET['support']))
{
	foreach($conf['files'] as $file)
	{
		$tpl = new template('style/'.THEME.'/'.$file);
		if($conf['template'])
		{
			$tpl->set($vars);
		}
		echo $tpl->parse();
	}
}
else
{
	$supported_content = json::select('style/'.THEME.'/theme.json','support');
	if(array_key_exists($_GET['support'], $supported_content))
	{
		if($supported_content[$_GET['support']]['needdefaultheme'])
		{
			foreach($conf['files'] as $file)
			{
				$tpl = new template('style/'.THEME.'/'.$file);
				if($conf['template'])
				{
					$tpl->set($vars);
				}
				echo $tpl->parse();
			}
		}
		foreach($supported_content[$_GET['support']]['files'] as $file)
		{
			$tpl = new template('style/'.THEME.'/'.$file);
			if($supported_content[$_GET['support']]['template'])
			{
				$tpl->set($vars);
			}
			echo $tpl->parse();
		}
	}
	else
	{
		echo 'This is not supported';
	}
}
?>