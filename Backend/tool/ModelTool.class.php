<?php
class ModelTool extends Core{
	public static $connect = null;
	public $dbInfo;
	public $modelDir;
	public $prefix = false;
	public static $alias = "M";
	public function getConnectInfo($dbInfo,$modelDir){
		$this->modelDir = $modelDir;
		$this->dbInfo	= $dbInfo;
	}	
	public function init(){
		if(is_null(ModelTool::$connect)){
			$dbConf = $this->dbInfo;
			$conn = new \MySQLi($dbConf['host'],$dbConf['user'],$dbConf['password'],$dbConf['dbName'],$dbConf['port']);  
			if(!$conn){
				die('数据库打开失败');
			}
			ModelTool::$connect = $conn;
			if(isset($dbConf['prefix'])){
				$this->prefix = $dbConf['prefix'];
			}
			return;
		}
		return;
	}
	public function getModel($modelName){
		$this->init();
		require $this->modelDir.'/'.$modelName.'.class.php';
		$model 		= new $modelName();
		$tableName 	= $this->getTableName($modelName);
		$model->init(ModelTool::$connect,$tableName);
		return $model;
	}

	private function getTableName($modelName){
		$prefix = '';
		if($this->prefix){
			$prefix = $this->prefix;
		}
		$temp_array = array();
		for($i=0;$i<strlen($modelName);$i++){
		  $ascii_code = ord($modelName[$i]);
		  if($ascii_code >= 65 && $ascii_code <= 90){
		    if($i == 0){
		  	 $temp_array[] = chr($ascii_code+32);
		    }else{
		  	$temp_array[] = '_'.chr($ascii_code + 32);
		    }
		  }else{
		    $temp_array[] = $modelName[$i];
		  }
		}
		return $prefix.implode('',$temp_array);	
	}

}

