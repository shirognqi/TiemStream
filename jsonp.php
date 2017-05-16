<?php
require(__DIR__.'/Backend/index.php');
$action = $R->getAction('action');
$method = $R->getMethod('method');
$controller = $B->getController($action);
$controller->run($method);

