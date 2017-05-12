<?php

/**
 *
 * 这个类提供CURL 获取页面的方法 
 */
class CURL{
		public $headers;
		public $referer;
		public $useragent;
		public $proxy;
		public $runTime = 30;
		public function init(
					$runTime = 30,
					$referer = false, 
					$X_ForwardedFor = false, 
					$clientIP = false, 
					$useragent = false, 
					$proxy = false
		){
			$this->getRandIP($X_ForwardedFor, $clientIP);
			$this->getReferer($referer);
			$this->getUseragent($useragent);
			$this->getProxy($proxy);
			$this->runTime = $runTime;
		}
		
		public function get($url) {
				$headers = $this->headers;
				$referer = $this->referer;
				$proxy 		= $this->proxy;
				$useragent 	= $this->useragent;
				$curl = curl_init();
				curl_setopt($curl, CURLOPT_URL, $url);
				curl_setopt($curl, CURLOPT_BINARYTRANSFER, true);  
				curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
				curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
				curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
				if($referer){
					curl_setopt($curl, CURLOPT_REFERER, $referer);
				}
				if($proxy){
					curl_setopt($curl, CURLOPT_PROXY, $proxy);
				}
				curl_setopt($curl, CURLOPT_USERAGENT,  $useragent);      	// 模拟浏览器类型
				curl_setopt($curl, CURLOPT_TIMEOUT, $this->runTime);        // 设置超时限制防止死循环    
				curl_setopt($curl, CURLOPT_HEADER, 0);                      // 显示返回的Header区域内容    
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);              // 获取的信息以文件流的形式返回
				$tmpInfo = curl_exec($curl);
				if($tmpInfo === false){
					$errMsg = '';
					$errNo 	= curl_errno($curl);
					switch(trim($errNo)){
						case 28 : $errMsg = '访问目标地址超时'; break;
						default : $errMsg = curl_error($curl); break;
					}
					// echo $errNo.chr(10);
					// echo $errMsg.chr(10);
					return false;
				} else {
					curl_close($curl); 
				}
				return $tmpInfo;
		}


		/**
		 * 输入为false，false的默认情况下提供了国内的IP地址；
		 * 
		 */
		function getRandIP($X_ForwardedFor, $clientIP) {
			if($X_ForwardedFor && $clientIP){
					$headers['CLIENT-IP'] = $clientIP;
					$headers['X-FORWARDED-FOR'] = $X_ForwardedFor;
			}else{	
				$ip_long = array(
					array('607649792', '608174079'), //36.56.0.0-36.63.255.255
					array('1038614528', '1039007743'), //61.232.0.0-61.237.255.255
					array('1783627776', '1784676351'), //106.80.0.0-106.95.255.255
					array('2035023872', '2035154943'), //121.76.0.0-121.77.255.255
					array('2078801920', '2079064063'), //123.232.0.0-123.235.255.255
					array('-1950089216', '-1948778497'), //139.196.0.0-139.215.255.255
					array('-1425539072', '-1425014785'), //171.8.0.0-171.15.255.255
					array('-1236271104', '-1235419137'), //182.80.0.0-182.92.255.255
					array('-770113536', '-768606209'), //210.25.0.0-210.47.255.255
					array('-569376768', '-564133889'), //222.16.0.0-222.95.255.255
				);
				$rand_key = mt_rand(0, 9);
				$ip= long2ip(mt_rand($ip_long[$rand_key][0], $ip_long[$rand_key][1]));
				$headers['CLIENT-IP'] = $this->isNotEmptyStr($clientIP)? $clientIP : $ip;
				$headers['X-FORWARDED-FOR'] = $this->isNotEmptyStr($X_ForwardedFor)?$X_ForwardedFor:$ip; 
			}
			$headerArr = array(); 
			foreach( $headers as $n => $v ) { 
					$headerArr[] = $n .':' . $v;  
			} 
			$this->headers = $headerArr;
		}

		private $useragentDefault = 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36';
		private function getUseragent($useragent){
			$this->useragent = $this->isNotEmptyStr($useragent) ? $useragent : $this->useragentDefault;
		}
		
		private function getReferer($referer){
			$this->referer = $this->isNotEmptyStr($referer) ? $referer : false;
		}
		private function getProxy($proxy){
			$this->proxy = $this->isNotEmptyStr($proxy) ? $proxy : false;
		}
		private function isNotEmptyStr($inputStr){
			if(is_string($inputStr)){
				if($inputStr != ""){
					return true;
				}
			}
			return false;
		}

		public function getURLState($url){
			if(!$this->isNotEmptyStr($url)){
				return false;
			}
			$urlInfo = parse_url($url);
			if(!isset($urlInfo['host'])){
				if(Core::$S->set($url)->startWith('/')){
					return false;
				}
				$urlInfo = parse_url('http://'.$url);
			}
			$path = (isset($urlInfo['path'])) ? $urlInfo['path'] : '/';
			$port = (isset($urlInfo['port'])) ? $urlInfo['port'] : 80;
			$host = $urlInfo['host'];
			$scheme = '';
			if(isset($urlInfo['scheme'])){
				if(strtolower($urlInfo['scheme']) == 'https'){
					$scheme = 'ssl://';
					$port = 443;
				}
			}
			if($fp = fsockopen($scheme.$host, $port, $errNo, $errStr, 30)){
				$send = "";
				$send .= "HEAD $path HTTP/1.1\r\n";
				$send .= "HOST: $host\r\n";
				$send .= "CONNECTION: Close\r\n\r\n";
				$send .= "ACCEPT: */*";
				$send .= "USER-AGENT: Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.52 Safari/536.5";
				$send .= "ACCEPT-ENCODING: gzip,deflate,sdch";
				$send .= "Accept-Charset: GBK,utf-8;q=0.7,*;q=0.3";

				fwrite($fp,$send);

				$data = fgets($fp,128);
				fclose($fp);
				list($response,$code) = explode(' ', $data);
				if($code == 200){
					return [$code, 'good'];
				}else{
					return [$code, 'badMsg'];
				}
			}else{
				return [$errStr,'badMsg'];
			}
		}
}
