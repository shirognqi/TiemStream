<?php
$files = scandir(__DIR__);
foreach($files as $k => $v){
	if($v==".") continue;			// .;
	if($v=="..") continue;			// ..;
	if($v=="index.php") continue;	// it self;
	$fileSuffix = '.class.php';
	$initial = ord(substr($v , 0 , 1));
	if($initial<65 || $initial>90) continue;
	if(substr($v,-10)!=$fileSuffix) continue;
	$file = __DIR__ . '/' . $v;
	require $file;
	$class = str_replace('.class.php','',$v);
	$classObjName  = $class::$alias;
	$$classObjName = new $class();
}

