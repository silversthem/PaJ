<?php 
/*
	-	CLASS ROUTER
	-	By Silversthem
	---------------------
	The router redirect url
	---------------------
*/
class router
{
	private $datas = array(); // routeur instructions

	public function __construct($file) // create a new router from a configuration file
	{
		$this->datas = json::open($file);
		if($this->datas == false || $this->datas == -1)
		{
			die('Error with '.$file);
		}
	}
	private function redirect($url,$multiple = false) // include the file who's matching to the url, if $multiple is an array, the function search also in
	{
		if(preg_match('#^'.$url['url'].'/?$#isU', URL,$matches))
		{
			if(array_key_exists('vars', $url))
			{
				$this->makeTHEgets($otherUrl['vars'],$matches);
			}
			include_once 'system/modules/'.$url['module'].'/index.php';
			return true;
		}
		elseif(gettype($multiple) == 'array')
		{
			foreach($multiple as $otherUrl)
			{
				if(preg_match('#^'.$otherUrl['url'].'$#isU',URL,$matches))
				{
					if(array_key_exists('vars', $otherUrl))
					{
						$this->makeTHEgets($otherUrl['vars'],$matches);
					}
					include_once 'system/modules/'.$url['module'].'/index.php';
					return true;
				}
			}
		}
	}
	private function makeTHEgets($keys,$vals) // add values in $_GET
	{
		$arrayKeys = explode(',', $keys);
		$i = 0;
		foreach($arrayKeys as $k)
		{
			$i+=1;
			if(array_key_exists($i, $vals))
			{
				$_GET[$k] = $vals[$i];
			}
			else
			{
				$_GET[$k] = false;
			}
		}
		return true;
	}
	public function run() // run the router
	{
		foreach($this->datas as $route)
		{
			if($route['type'] == 'multiple')
			{
				$this->redirect($route,$route['other']);
			}
			else
			{
				$this->redirect($route);
			}
		}
		return true;
	}
}