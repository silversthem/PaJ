<?php 
/*
	-	CLASS Template
	-	By Silversthem
	---------------------
	The template class complete html models
	---------------------
*/
class template
{
	private $content; // the html model
	private $vars = array(); // the vars to replace

	public function __construct($file) // get the content of the file, file should be a valid template
	{
		$content = file_get_contents($file);
		if($content === false)
		{
			die("Template not found");
		}
		$this->content = $content;
	}
	public function set($vars) // set vars
	{
		$this->vars = $vars;
	}
	public function parse() // print the result of the parsing of the template
	{
		ob_start();
		foreach($this->vars as $key => $var)
		{
			$this->content = preg_replace('#'.preg_quote('{{'.$key.'}}').'#',$var,$this->content);
		}
		echo $this->content;
		return ob_get_clean();
	}
}
?>