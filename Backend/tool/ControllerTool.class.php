<?php
/**
 * 
 *
 */
class ControllerTool extends Core{
	public $controllerDir;
	public static $alias = "B";
	public function getControllerDir($dir){
		$this->controllerDir = $dir;
	}

	public function getController($controllerName){
		$nameSpace = '\\Controller\\';
		require $this->controllerDir.'/'.$controllerName.'.class.php';
		$className = $nameSpace . $controllerName;
		$controller = new $className();
		//$this->controllerInit($controller);
		return $controller;
	}

	



//	private function controllerInit(&$controller){
//		$controller->A = $this->A;
//		$controller->B = $this->B;
//		$controller->C = $this->C;
//		$controller->L = $this->L;
//		$controller->S = $this->S;
//	}
}
