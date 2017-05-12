<?php
class StringTool{
	private $input = '';
	public static $alias = 'S';
	public function __toString(){
		if($this->input) return $this->input;
		return '';
	}

	/**
	*
	*
	*/

	public function set($input,$defaultVal=''){
		$this->input = $input;
		if(!$this->isNotEmptyString()){
			$this->input = $defaultVal;
		}
		return $this;
	}

	public function get(){
		return $this->input;
	}
	
	/**
	*
	*	判定输入是否为非空字符串
	*/

	public function isNotEmptyString(){
		if(is_string($this->input) && $this->input !== ""){
			return true;
		}
		return false;
	}

	public function startWith($start,$ignoreCase = true){
		if(!$this->isNotEmptyString()){
			return false;
		}
		if($ignoreCase){
			$position = stripos($this->input, $start);
		}else{
			$position = strpos($this->input, $start);
		}
		return ($position === 0);
	}

	public function endWith($end,$ignoreCase = true){
		$length = strlen($end);  
		if($length == 0){    
				return true;  
		}
		if($ignoreCase){
			return (strtolower(substr($this->input, -$length)) === strtolower($end));
		}else{
			return (substr($this->input, -$length) === $end);
		}
	}

}

