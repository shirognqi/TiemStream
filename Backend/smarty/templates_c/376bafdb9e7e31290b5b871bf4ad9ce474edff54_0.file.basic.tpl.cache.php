<?php
/* Smarty version 3.1.30, created on 2017-04-27 04:39:58
  from "/var/www/html/joblist/Backend/smarty/templates/basic.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5901761e24a503_77123141',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '376bafdb9e7e31290b5b871bf4ad9ce474edff54' => 
    array (
      0 => '/var/www/html/joblist/Backend/smarty/templates/basic.tpl',
      1 => 1493267525,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5901761e24a503_77123141 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->compiled->nocache_hash = '14780365525901761e2446b6_75104894';
?>
<!DOCTYPE html>
<html>
<head>
		<title>Time Stream</title>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Bootstrap start-->
		<link href="Front/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<?php echo '<script'; ?>
 src="Front/bootstrap/js/html5shiv.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="Front/bootstrap/js/respond.js/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
		<![endif]-->
		<!-- Bootstrap end-->
		<link href="Front/css/index.css" rel="stylesheet">
</head>

<body>
	<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11157116245901761e2493f5_65700093', 'body');
?>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <?php echo '<script'; ?>
 src="Front/js/jquery.min.js"><?php echo '</script'; ?>
>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <?php echo '<script'; ?>
 src="Front/bootstrap/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="Front/simpleStorage-master/simpleStorage.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="Front/js/functions.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="Front/js/index.js"><?php echo '</script'; ?>
>
</body>
</html>
<?php }
/* {block 'body'} */
class Block_11157116245901761e2493f5_65700093 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'body'} */
}
