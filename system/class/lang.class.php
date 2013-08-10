<?php 
/*
	-	CLASS LANG
	-	By Silversthem
	---------------------
	This class take care of languages
	---------------------
*/
class lang
{
	private $file;
	private $lang;
	private $content;

	public function __construct($file,$lang)
	{
		$this->file = json::open($file);
		if($this->file == false)
		{
			die('cannot find lang file');
		}
		$this->lang = $lang;
		if(!array_key_exists($lang, $this->file))
		{
			die('Cannot find lang');
		}
		$this->content = $this->file[$this->lang];
	}
	public function read($k)
	{
		if(array_key_exists($k, $this->content))
		{
			return $this->content[$k];
		}
		return false;
	}
}
?>