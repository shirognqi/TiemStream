<?php

class ConfTool{
	private $conf = [];
	public static $alias = "C";
	public function getConfigureFile($file){
		if(file_exists($file)){
			$this->conf = require($file);
		}else{
			die('file '.$file.' does not Exitst');
		}
	}

	public function get($key){
		if(key_exists($key, $this->conf)){
			return $this->conf[$key];
		}
		return false;
	}

	public function set($key, $value){
		$this->conf[$key] = $value;
	}

}
