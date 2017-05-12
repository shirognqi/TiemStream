<?php
/* Smarty version 3.1.30, created on 2017-04-27 04:30:11
  from "/var/www/html/joblist/Backend/smarty/templates/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_590173d38b3b67_70504850',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bcc81179ec44c25cc94e34647ef682553c630ac7' => 
    array (
      0 => '/var/www/html/joblist/Backend/smarty/templates/index.tpl',
      1 => 1493265898,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:basic.tpl' => 1,
    'file:create.tpl' => 1,
    'file:list.tpl' => 1,
  ),
),false)) {
function content_590173d38b3b67_70504850 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
$_smarty_tpl->compiled->nocache_hash = '243815743590173d38a8e53_47731689';
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1431707389590173d38b2c44_64582320', "body");
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:basic.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "body"} */
class Block_1431707389590173d38b2c44_64582320 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<div class="container">
		<h1>Time Stream <small> Enjoy The Smarty Day, 待我代码编成，娶你为妻可好 <b style="color:red;">狂龙~</b></small></h1>
		<?php $_smarty_tpl->_subTemplateRender("file:create.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

		<?php $_smarty_tpl->_subTemplateRender("file:list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	</div>
<?php
}
}
/* {/block "body"} */
}
