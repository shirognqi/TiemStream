<?php
namespace Controller;

class URLInfo extends \Controller{
	public function getInfo(){
		$model = self::$M->getModel('Icon');
		$model->md5Exist($md5);
		//$model->insertMD5(789456);
	}
}
