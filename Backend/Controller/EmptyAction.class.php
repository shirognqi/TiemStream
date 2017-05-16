<?php
namespace Controller;

class EmptyAction extends \Controller{
	
	public function init($className){
		$smartyFactory = self::$L->getLib('SmartyFactory');
		$smarty = $smartyFactory->getSmarty();
		$action = \Core::$I->request('action');
		$smarty->setCacheLifetime(3);
		if($action){
			$smarty->assign('actionState', true);
			$smarty->assign('actionName', $action);
		}else{
			$smarty->assign('actionState', false);
		}
		$smarty->display('emptyAction.tpl');
	}
}
