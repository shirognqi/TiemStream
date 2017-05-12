<?php
require(__DIR__.'/Backend/index.php');
$action = $R->getAction('action','get');
$method = $R->getMethod('method','get');
$controller = $B->getController($action);
$controller->run($method);

