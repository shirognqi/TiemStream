<?php
namespace Controller;

class FastRember extends \Controller{
	public function getName(){
		$model = self::$M->getModel('FastRember');
		$names = $model->getName();
		if(is_array($names)){
			reply($names);
		}else{
			reply(0,-1, 'getName Model Erroe');
		}
		return;
	}
	public function setName(){
		$model = self::$M->getModel('FastRember');
		$name = self::$I->get('name');
		$nameState = $model->getName($name);
		if($nameState){
			reply(0,-1, 'name exist;');
			return;
		}
		$insertState = $model->insertName($name);
		if($insertState>=0)
			reply($name);
		else
			reply(0, -2, 'Mysql Error');
		return;
	}
	public function delName(){
		$model = self::$M->getModel('FastRember');
		$name = self::$I->get('name');
		$nameState = $model->getName($name);
		if($nameState){
			$id = $model->delName($name);
			reply($name);
		}else{
			reply($name,-1, 'name not exist');
		}
	}
	public function getPrefix(){
		$model = self::$M->getModel('FastRember');
		$prefixs = $model->getPrefix();
		if(is_array($prefixs)){
			reply($prefixs);
		}else{
			reply(0,-1, 'getName Model Erroe');
		}
		return;
	}

	public function setPrefix(){
		$model = self::$M->getModel('FastRember');
		$prefix = self::$I->get('prefix');
		$prefixState = $model->getPrefix($prefix);
		if($prefixState){
			reply(0,-1, 'prefix exist;');
			return;
		}
		$insertState = $model->insertPrefix($prefix);
		if($insertState>=0)
			reply($prefix);
		else
			reply(0, -2, 'Mysql Error');
		return;
	}

	public function delPrefix(){
		$model = self::$M->getModel('FastRember');
		$prefix = self::$I->get('prefix');
		$prefixState = $model->getPrefix($prefix);
		if($prefixState){
			$id = $model->delPre($prefix);
			reply($prefix);
		}else{
			reply($prefix, -1, 'Data not Exist');
		}
	}
}
