<?php
/* Smarty version 3.1.30, created on 2017-04-26 09:57:34
  from "/var/www/html/joblist/Backend/smarty/templates/HTML_batch.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59006f0eba43c4_18768801',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5ca8e48e6b7701a4952428bad7b3cdadd63cd605' => 
    array (
      0 => '/var/www/html/joblist/Backend/smarty/templates/HTML_batch.tpl',
      1 => 1493200593,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59006f0eba43c4_18768801 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '181064511059006f0eba3746_79644833';
?>
<div class="col-sm-12">
  <table class="table  table-hover table-condensed">
  	<thead>
		<th>URI</th>
		<th>Icon</th>
		<th>Title</th>
		<th>Summery</th>
		<th>Discription</th>
		<th>PRI</th>
	</thead>
	<tr>
		<td>URI</td>
		<td>Icon</td>
		<td><input type="text" class="form-control" value="Title" /></td>
		<td><input type="text" class="form-control" value="Summery" /></td>
		<td><textarea class="form-control" rows="1">Discription</textarea></td>
		<td>
			<input type="checkbox" class="checkbox center-block" />
		</td>

	</tr>
  </table>
</div>
<?php }
}
