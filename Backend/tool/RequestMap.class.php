<?php
class RequestMap{
	private $requestMap;
	public static $alias = 'R';
	public function init($requestMap){
		$this->requestMap = $requestMap;
	}

	public function getAction($actionName='action',$method=''){
		if(strtolower($method) === 'post'){
			if(!isset($_POST[$actionName])){
				$actionkey = 'null';
			}else{
				$actionkey = $_POST[$actionName];
			}
		}elseif(strtolower($method) === 'get'){
			if(!isset($_GET[$actionName])){
				$actionkey = 'null';
			}else{
				$actionkey = $_GET[$actionName];
			}
		}else{
			if(!isset($_REQUEST[$actionName])){
				$actionkey = 'null';
			}else{
				$actionkey = $_REQUEST[$actionName];
			}
		}
		if(isset($this->requestMap[$actionkey])){
			$action = $this->requestMap[$actionkey];
		}else{
			$action = $this->requestMap['null'];
		}
		return $action;
	}
	public function getMethod($fun, $method = ''){
		if(!is_string($fun) || $fun ==''){
			$methodName = 'null';
		}else{
			if(strtolower($method) === 'post'){
				if(!isset($_POST[$fun])){
					$methodName = 'null';
				}else{
					$methodName = $_POST[$fun];
				}
			}elseif(strtolower($method) === 'get'){
				if(!isset($_GET[$fun])){
					$methodName = 'null';
				}else{
					$methodName = $_GET[$fun];
				}
			}else{
				if(!isset($_REQUEST[$fun])){
					$methodName = 'null';
				}else{
					$methodName = $_REQUEST[$fun];
				}
			}
		}
		return $methodName;
	}
}	
