<?php
/*
	-	CLASS JSON
	-	By Silversthem
	---------------------
	This class takes care of files
*/
class json
{
	public static function open($file) // read the array in $file, return FALSE if json failed and -1 if file doesn't exists else return an array
	{
		$content = file_get_contents($file);
		if($content == false)
		{
			return -1;
		}
		return json_decode($content,true);
	}
	public static function write($file,$array) // write $array in file, replacing all the content by $array in json, return -1 if json failed or return false if file doesn't exists
	{
		$content = json_encode($array);
		if($content == false) // encoding error
		{
			return -1;
		}
		return file_put_contents($file, $content);
	}
	public static function set($file,$key,$value) // add $value in the array in $file with key $key, return false if the file make an error  or -1 if json failed
	{
		$array = json::open($file);
		if($array == -1 || $array == false)
		{
			return $array;
		}
		$array[$key] = $value;
		return json::write($file,$array);
	}
	public static function insertBefore($file,$value) // insert $value as first element in the array in $file
	{
		$content = json::open($file);
		if($content == false || $content == -1)
		{
			return false;
		}
		array_unshift($content, $value);
		return json::write($file);
	}
	public static function delete($file,$key) // delete the key $key in array in $file, return -1 if file doesn't exists or false if $key doesn't exists
	{
		$content = json::open($file);
		if($content == false || $content == -1)
		{
			return -1;
		}
		if(array_key_exists($key, $content))
		{
			unset($content[$key]);
			json::write($content);
			return true;
		}
		return false;
	}
	public static function select($file,$key) // get the value of the key $key in array in file $file, for multi dimensional array, use an array for $key
	{
		$content = json::open($file);
		if($content == false || $content == -1)
		{
			return -1;
		}
		if(gettype($key) == 'array')
		{
			$last = $content;
			foreach($key as $k)
			{
				if(gettype($last) != 'array')
				{
					return $last;
				}
				if(array_key_exists($k, $last))
				{
					$last = $last[$k];
					if(end($key) == $k)
					{
						return $last;
					}
				}
			}
		}
		elseif(gettype($key) == 'string' || gettype($key) == 'integer')
		{
			if(array_key_exists($key, $content))
			{
				return $content[$key];
			}
		}
		return false;
	}
	public static function add($file,$value) // add $value to the array in $file
	{
		$content = json::open($file);
		if($content == false || $content == -1)
		{
			return false;
		}
		$content[] = $value;
		return json::write($file,$content);
	}
}