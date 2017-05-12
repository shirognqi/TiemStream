<?php
	/**
	* 配置文件
	*/
return [
	'RequestMap' => [
		'null'			=> 'EmptyAction',
		'fast_rember'	=> 'FastRember',
		'spider'		=> 'Spider',
		'url_info'		=> 'URLInfo'
	],
	'iconBaseInfo'		=> [
		'storage'	=> dirname(__DIR__).'/Icons',
		'front'		=> '/joblist/Icons'
	],
	'Mysql' => [
		'host'		=>'127.0.0.1',
		'user'		=>'shirongqi',
		'password'	=>'A0326159487',
		'dbName'	=>'time_stream',
		'charSet'	=>'utf8',
		'port'		=>'3306',
		'prefix'	=>'t_'
	]
];
