<!DOCTYPE html>
<html>
<head>
		<title>Sorry</title>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Bootstrap start-->
		<link href="Front/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="Front/bootstrap/js/html5shiv.min.js"></script>
		<script src="Front/bootstrap/js/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<!-- Bootstrap end-->
</head>

<body>
	{if $actionState}
	Sorry, The Action {$actionName} has gone...
	{else}
	no action defined;
	{/if}
    <script src="Front/js/jquery.min.js"></script>
    <script src="Front/bootstrap/js/bootstrap.min.js"></script>
    <script src="Front/simpleStorage-master/simpleStorage.min.js"></script>
</body>
</html>
