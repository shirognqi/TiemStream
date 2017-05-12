<?php
require(__DIR__.'/Backend/index.php');
$smarty = $B->getController('GetRander');
$smarty->rander();
