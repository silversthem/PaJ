<?php 
if(!isset($_GET['page'])){return true;}else{
	if(file_exists('system/modules/'.$_GET['page'].'/admin.php'))	
	{
		return true;
	}
}
return false;
