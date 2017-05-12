<?php

class FastRember extends Model{
	/**
	*	self::$conn;
	*	self::$tableName;
	*
	*/
	public function insertPrefix($prefix){
		return $this->insertFastRember($prefix, 0);
	}

	public function insertName($name){
		return $this->insertFastRember($name, 1);
	}

	private function insertFastRember($value,$type){
		$stmt = self::$conn->prepare("INSERT INTO ".self::$tableName." VALUES (null, ?, ?)");
		$stmt->bind_param('is', $type, $value);
		$stmt->execute();
		$lastInsertId = $stmt->insert_id;
		$stmt->close();
		return $lastInsertId;
	}

	private function deleteFastRember($value,$type){
		$stmt = self::$conn->prepare("DELETE  FROM ".self::$tableName." WHERE value=? AND type=?");
		$stmt->bind_param('si', $value, $type);
		$stmt->execute();
		$id = $stmt->id;
		$stmt->close();
		return $id;
		
	}

	public function delPre($value){
		return $this->deleteFastRember($value,0);
	}
	public function delName($value){
		return $this->deleteFastRember($value,1);
	}
	/**
	* 获取关键词
	*/
	public function getPrefix($prefix = false){
		return $this->smartyGet($prefix,0);
	}
	public function getName($name = false){
		return $this->smartyGet($name,1);
	}
	private function smartyGet($value, $type){
		if($value == false){
			$stmt = self::$conn->prepare("SELECT value FROM ".self::$tableName." WHERE type=?");
			$stmt->bind_param('i', $type);
		}else{
			$stmt = self::$conn->prepare("SELECT value FROM ".self::$tableName." WHERE type=? AND value=?");
			$stmt->bind_param('is', $type, $value);
		}
		$stmt->execute();
		$reply = $stmt->get_result();
		$stmt->close();
		if($value == false){
			if($reply->num_rows<=0){
				$ret = [];
			}else{
				$ret = [];
				while ($row = $reply->fetch_assoc()) {
					$ret[] = $row['value'];
				}
			}
		}else{
			if($reply->num_rows<=0){
				$ret = false;
			}else{
				$ret = true;
			}
		}
		return $ret;
	}




}
