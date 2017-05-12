<?php
class InputTool extends Core{
	public static $alias = "I";
	public function get($key, $defaultVal=false){
		if(isset($_GET[$key])){
			return $_GET[$key];
		}else{
			return $defaultVal;
		}
	}
	public function post($key,$defaultVal=false){
		if(isset($_POST[$key])){
			return $_POST[$key];
		}else{
			return $defaultVal;
		}
	}
	public function request($key,$defaultVal=false){
		if(isset($_REQUEST[$key])){
			return $_REQUEST[$key];
		}else{
			return $defaultVal;
		}
	}
}
