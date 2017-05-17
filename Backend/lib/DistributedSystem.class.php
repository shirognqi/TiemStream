<?php

	/**
	* 关于文件系统，如果考虑分布式，找个稳定的地儿存挺爽的，但是妥妥的没有本地文件系统用的舒服，
	*		比如：我就想require加一个配置文件，这个必须在本地磁盘，远程路径没法用；由于都不知道啥时候更新的，
	*		每次都去下载？！别扯犊子了！
	* 对于这个问题，我就想，嗨，就推进队列，大家启动服务端各存各的呗，反正目前配置都不大，
	* 大点的再想辙（大不了队列里存CDN信息，存CDN好了）;
	*/ 

class DistributedSystem{
	public static $baseDir		= "";
	public static function serverInit($dir){
		self::$serverBaseDir = $dir;
	}
	public static function fileListServer($file, $contentOrRealPath, $action='modify'){
		if(!Core::$S->startWith($file,'/')){		// $file是/打头
			if(!self::$serverBaseDir) return false;
			$realFile = rtrim(self::$serverState,'/').'/'.ltrim($file,'/');
		}else{										// $file不是/打头
			$realFile = $file;
		}
		
		$data = array();
		$data['state'] = 0;
		$data['file']  = $realFile;
		$_action = strtolower($action);
		switch($_action){
			case 'add':
			case 'modify':
				$data['action']         = 'modify';
				$data['content']        = $contentOrRealPath;
			break;
			case 'big_file':
				// 执行上传CDN的业务；
				// 并看是否能上传成功；
				$cdnInfo = pushCDNgetCDNInfo($file,$contentOrRealPath);
				if($cdnInfo[code] != 0){
					return false;
				}else{
					$data['action']         = 'cdn_download';
					$data['cdn_info']       = $cdnInfo['downloadPath'];
				}
			break;
			case 'append':
				$data['action']         = 'append';
				$data['content']        = $contentOrRealPath;
			break;
			case 'del':
			case 'delete':
				$data['action'] = 'del';
			break;
			default :
				$data['state'] = -1;
				return false;
			break;
		}
		$setActionState = self::setList($data);
		return $setActionState;
	}
	public static function setList($data){
		if(!isset($data['state']))return false;
		if($data['state']!=0) return false;
		$date_json = json_encode($data);
		$insertState = false;
		foreach(self::$ipList as $ip){
			$singleState = \MyList::rpush($ip,$data_json);
			if(!$singleState) return false;
		}
		return true;
	}

	public static $clientState 	= false;
	public static $clientIP		= '';
	public static function clientInit($ip){
		if(!in_array($ip,self::$ipList)){
			return false;
		}else{
			self::$clientIP 	= $ip;
			self::$clientState 	= true;
		}
	}
	// 要有创建路径的能力；
	public static function fileListClient(){
		if(!self::$clientState) return false;
		while(true){
			$fileInfo = self::getListInfo();
			if($fileInfo){
				$modifyState = $appendState =  $delState = false;
				switch($action){
					case 'modify':
					$modifyState 	= self::doModify($fileInfo);
					break;
					case 'append':
					$appendState 	= self::doAppend($fileInfo);
					break;
					case 'del':
					$delState 	= self::doDel($fileInfo);
					break;
				}
				if($modifyState || $delState || $appendState){
					$fileInfo = \MyList::lpop(self::$clientIP);
					if($fileInfo){
						continue;
					}else{
						sleep(20);
					}
				}else{
					sleep(20);
				}
			}else{
				sleep(2);
			}
		}	
	}
	public static function getListInfo(){
		$length = \MyList::length(self::$clientIP);
		if($length<=0)return false;
		$fileInfo = \MyList::index(self::$clientIP,0);
		if(!$fileInfo) return false;
		$decode = json_decode($fileInfo);
		if(!$decode) return false;
		if(!isset($decode['action'])) return false;
		if($decode['action'] == 'modify' || $decode['action'] == 'append'){
			if(isset($decode['file']) && isset($decode['content'])){
				return $decode;
			}else{
				return false;
			}
		}elseif($decode['action'] == 'del'){
			if(isset($decode['file'])){
				return $decode;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
}

class MyList{
	static public function rpush(){
	
	}	
}

