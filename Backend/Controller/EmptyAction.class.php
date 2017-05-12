<?php
namespace Controller;

class EmptyAction extends \Controller{
	public function run(){
		$smartyFactory = self::$L->getLib('SmartyFactory');
		$smarty = $smartyFactory->getSmarty();
		$smarty->display('emptyAction.tpl');
	}
}
