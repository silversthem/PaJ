<?php 
/*
	-	SOME AMAZING HELPERS
	-	By Silversthem
	---------------------
	Love that
*/
function IssetP()
{
	$c = func_get_args();
	foreach($c as $i)
	{
		if(!isset($_POST[$i]))
		{
			return false;
		}
	}
	return true;
}
?>