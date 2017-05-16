<?php
namespace Controller;

class Spider extends \Controller{
	public function getURLInfo(){
		// 获取CURL来获取页面HTML
		$curl = self::$L->getLib('CURL');
		$curl->init();
		$info = [];
		$urlStr = trim(self::$I->post('url'));
		if(!$urlStr){
			return reply('',-1,'url is Empty');
		}
		$oriStr = $curl->get($urlStr);
		// 获取HTML解析器；
		$parseHTML = self::$L->getLib('ParseHTML');
		$parseHTML->init($oriStr);
		$title		= $parseHTML->getTitle();
		$keywords	= $parseHTML->getKeywords();
		$discription= $parseHTML->getDescription();
		$contents	= $parseHTML->getContents();
		$_iconHref	= $parseHTML->getIconHref($urlStr);
		$iconLocalStorage = $this->iconLocalStorage($curl, $_iconHref);
		$info = [
			'title'			=> $title,
			'keywords'		=> $keywords,
			'discription'	=> $discription,
			'contents'		=> $contents,
		];
		if(is_array($iconLocalStorage)){
			$info['icon'] = $iconLocalStorage['href'];
		}else{
			$info['icon'] = $_iconHref;
		}
		reply($info);
	}

	private function iconLocalStorage($curl,$iconHref){
		$iconState = $curl->getURLState($iconHref);
		if($iconState[0] != 200){
			return false;
		}
		$iconContent = $curl->get($iconHref);
		if(!$iconContent){
			return false;
		}

		$md5 = md5($iconContent);

		$iconNameInfo = pathinfo($iconHref);
		$extension = 'ico';
		if(isset($iconNameInfo['extension'])  && trim($iconNameInfo['extension'])){
			$extension = strtolower($iconNameInfo['extension']);
		}
		
		$iconModel = self::$M->getModel('Icon');
		
		$fileInfo = $iconModel->getFileInfo($md5,$extension);

		if(is_numeric($fileInfo)){
			$fileName	= $iconModel->insertFile($md5, $extension, $iconHref);
			$filePath	= \Core::$C->get('iconBaseInfo')['storage'].'/'.$fileName.'.'.$extension;
			$writeState = file_put_contents($filePath, $iconContent);
			if(!$writeState) return false;	
		}else{
			$fileName = $fileInfo['id'];
			$extension = $fileInfo['extension'];
		}
		$iconLocalHref = \Core::$C->get('iconBaseInfo')['front'].'/'.$fileName.'.'.$extension;

		$ret = [
			'fileName'	=> $fileName,
			'href'		=> $iconLocalHref
		];
		return $ret;
	}
}
