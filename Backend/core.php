<?php
require __DIR__.'/vendor/autoload.php';
class Core{
	public static $A; // Array
	public static $B; // Controller
	public static $C; // Configure
	public static $I; // Configure
	public static $L; // lib
	public static $M; // Model
	public static $R; // RequestMap
	public static $S; // String
	
	public Static function setAction($A,$B, $C, $I, $L, $M, $R, $S){
		Core::$A = $A;
		Core::$B = $B;
		Core::$C = $C;
		Core::$I = $I;
		Core::$L = $L;
		Core::$R = $R;
		Core::$M = $M;
		Core::$S = $S;
	}
}
class Model{
	public static $conn = null;
	public static $tableName = null;
	public function init($conn,$tableNmae){
		if(is_null(self::$conn)){
			self::$conn			= $conn;
			self::$tableName	= $tableNmae;
		}
	}
	public function __distruct(){
		self::$conn->close();
	}
}
class Controller extends Core{
	public function run($method){
		$methodState = method_exists($this, $method);
		if($methodState){
			// 这里可以放一些前缀方法，后面可以放后缀方法;
			$this->$method();
		}else{
			$this->emptyMethod($method);
		}
	}
	public function emptyMethod($method){
		echo '方法:'.$method.'不存在';
	}
}


function reply($input, $code=0, $msg='OK'){
	$return = [
		'code' => $code,
		'msg'  => $msg
	];
	$return['data'] =  $input;
	if(is_object($input) || is_array($input)){
		if(is_array($input)){
			$return['count'] = count($input);
		}elseif(isset($input->count)){
			$return['count'] = $input->count;
		}
		$data = json_encode($return);
	}elseif(is_string($input) || is_numeric($input)){
		$data = json_encode($return);
	}else{
		$return['data'] =  '';
		$data = json_encode($return);
	}
	$callback = Core::$I->request('callback');
	if($callback){
		echo $callback.'('.$data.')';
	}else{
		echo $data;
	}
	return;
}

