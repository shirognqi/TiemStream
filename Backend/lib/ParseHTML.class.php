<?php
use PHPHtmlParser\Dom;
class ParseHTML{
	public $dom = false;
	public static $specialChar = array();

	public function __construct(){
		if(empty(ParseHTML::$specialChar)){
			for($i=0; $i<33; $i++){
				ParseHTML::$specialChar[$i] = chr($i);
			}
		}
	}
	public function init($htmlStr){
		if(Core::$S->set($htmlStr)->isNotEmptyString()){
			$this->dom = new PHPHtmlParser\Dom();
			$this->dom->load($htmlStr);
		}
	}

	public function getTitle(){
		if($this->dom === false){
			return false;
		}
		$titleDom = $this->dom->find('title');
		$title = false;
		if(count($titleDom)>0){
			$title = $titleDom[0]->text;
		}
		return $title;
	}
	public function getKeywords(){
		if($this->dom === false){
			return false;
		}
		$keyword	= false;
		$metas = $this->dom->find('meta[name=keywords]');
		if(count($metas)>0){
			$metaKeyword = $metas[0];
			$keyword =  trim($metaKeyword->getAttribute("content"));
		}
		return $keyword;
	}

	public function getDescription(){
		if($this->dom === false){
			return false;
		}
		$description = false;
		$metas = $this->dom->find('meta[name=description]');
		if(count($metas)>0){
			$metaKeyword = $metas[0];
			$description = trim($metaKeyword->getAttribute("content"));
		}
		return $description;
	}
	
	public function getContents($headerPartCount=200){
		if($this->dom === false){
			return false;
		}
		$contents = false;
		$body = $this->dom->find('body');
		if(count($body)>0){
			
			$contents = trim(strip_tags($body[0]->innerHTML));
			$contents = str_replace(ParseHTML::$specialChar,"",$contents);
			if(mb_strlen($contents)>$headerPartCount){
				$contents = substr($contents, 0, $headerPartCount);
			}
		}
		return $contents;
	}

	public function getIconHref($url){
		if($this->dom === false){
			return false;
		}
		$links	= $this->dom->find('link[rel=icon]');
		$href	= $this->getHref($links);
		if(!$href){
			$links	= $this->dom->find('link[shortcut icon=icon]');
			$href   = $this->getHref($links);
		}
		if($href){
			$hrefInfo = parse_url($href);
			if(isset($hrefInfo['scheme'])){		// 包含协议
				return $href;
			}else{								// 不包含协议
				$urlInfo = parse_url($url);
				if(!isset($urlInfo['scheme'])){
					if(Core::$S->set($url)->startWith('/')){
						return false;
					}
					$urlInfo = parse_url('http://'.$url);
				}
				if(isset($hrefInfo['host'])){	// 没有协议，但有域名
					return $urlInfo['scheme'].':'. $href;
				}else{							// 纯路径
					if(Core::$S->set($href)->startWith('/')){	// 绝对路径
						$userInfo = $this->getUserInfoFromURL($urlInfo);
						$urlPath = $this->getPathAndPort($urlInfo);
						return $urlInfo['scheme'].'://'.$userInfo.$urlPath.$href;
					}else{										// 相对路径；
						if(Core::$S->set($url)->endWith('/')){
							return $url.$href;
						}
						return dirname($url).'/'.$href;
					}
				}
			}
		}else{
			$urlInfo = parse_url($url);
			if(!isset($urlInfo['scheme'])){
				if(Core::$S->set($url)->startWith('/')){
					return false;
				}
				$urlInfo = parse_url('http://'.$url);
			}

			$userInfo = $this->getUserInfoFromURL($urlInfo);
			$urlPath = $this->getPathAndPort($urlInfo);

			return $urlInfo['scheme'].'://'.$userInfo.$urlPath.'/favicon.ico';
		}
		return $href;
	}
	private function getPathAndPort($urlInfo){
		if(isset($urlInfo['port'])){
			return $urlInfo['host'].':'.$urlInfo['port'];
		}else{
			return $urlInfo['host'];
		}
	}
	private function getUserInfoFromURL($info){
		if(isset($info['user']) && isset($info['pass'])){
			return $info['user'].":". $info['pass'].'@';
		}elseif(isset($info['user'])){
			return $info['user'].'@';
		}
		return '';
	}
	private function getHref($links){
		if(count($links)>0){
			$link = $links[0];
			$href = $link->getAttribute('href');
			if(is_string($href)){
				$href = trim($href);
			}
			if($href){
				return $href;	
			}
		}
		return false;
	}
}
