<?php
require(__DIR__.'/core.php');
require(__DIR__.'/tool/index.php');
$C->getConfigureFile(__DIR__."/conf.php");
$B->getControllerDir(__DIR__.'/Controller');
$R->init($C->get('RequestMap'));
$L->getLibDir(__DIR__.'/lib');
$M->getConnectInfo($C->get('Mysql'), __DIR__.'/Model');
$A = '';
Core::setAction($A, $B, $C, $I, $L, $M, $R, $S);
