<?php

/**
 *
 *
 */
class LibTool{
	public $libDir;
	public static $alias = "L";
	public function getLibDir($dir){
		$this->libDir = $dir;
	}
	public function getLib($libName){
		require $this->libDir.'/'.$libName.'.class.php';
		return new $libName();
	}
}
