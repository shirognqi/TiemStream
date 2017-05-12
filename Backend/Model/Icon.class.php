<?php
class Icon extends Model{
	public function getFileInfo($md5,$extension){
		$sql  = "SELECT * FROM ".self::$tableName." WHERE md5=? AND extension=?";
		$stmt = self::$conn->prepare($sql);
		$stmt->bind_param('ss', $md5, $extension);
		$stmt->execute();
		$stmt->bind_result($id, $existMD5, $extension, $ori_url);
		while ($stmt->fetch()) {
			return [
				'id'		=> $id,
				'extension' => $extension,
				'ori_url'	=> $ori_url,
			];
		}
		return 0;
	}

	public function insertFile($md5, $extension, $fromWhere){
		$sql  = "INSERT INTO ".self::$tableName." VALUES(null, ?, ?, ?)";	
		$stmt = self::$conn->prepare($sql);
		$stmt->bind_param('sss', $md5, $extension, $fromWhere);
		$stmt->execute();
		if(isset($stmt->insert_id) && $stmt->insert_id>0){		
			$lastInsertID = $stmt->insert_id;
			$stmt->close();
			return $lastInsertID;
		}
		$stmt->close();
		return false;
	}
	
}
