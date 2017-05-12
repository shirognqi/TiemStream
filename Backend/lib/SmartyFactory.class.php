<?php

class SmartyFactory{
	public static $oneSmarty = null;
	public static function getSmarty(){
		if(is_null(self::$oneSmarty)){
			$basicDir =  dirname(__DIR__) . '/smarty/';
			require $basicDir . '/libs/Smarty.class.php';
			$templatesDir           = $basicDir."templates";
			$templatesCompileDir    = $basicDir."templates_c";
			$cacheDir               = $basicDir."cache";
			$smarty= new Smarty();
			$smarty->setCaching(Smarty::CACHING_LIFETIME_SAVED);
			$smarty->setCacheLifetime(600);
			$smarty->setTemplateDir($templatesDir)
				->setCompileDir($templatesCompileDir)
				->setCacheDir($cacheDir);
			SmartyFactory::$oneSmarty = $smarty;
		}
		return SmartyFactory::$oneSmarty;
	}	
}
