<?php
namespace Controller;

class GetRander extends \Controller{
	public function rander(){
		$smartyFactory = self::$L->getLib('SmartyFactory');
		$smarty = $smartyFactory->getSmarty();
		$smarty->display('index.tpl');
	}

}

?>
