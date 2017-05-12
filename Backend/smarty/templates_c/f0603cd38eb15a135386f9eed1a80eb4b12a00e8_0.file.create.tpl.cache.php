<?php
/* Smarty version 3.1.30, created on 2017-05-12 01:31:39
  from "/var/www/html/joblist/Backend/smarty/templates/create.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5915107b17e239_75484135',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f0603cd38eb15a135386f9eed1a80eb4b12a00e8' => 
    array (
      0 => '/var/www/html/joblist/Backend/smarty/templates/create.tpl',
      1 => 1494493444,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:HTML_batch.tpl' => 1,
  ),
),false)) {
function content_5915107b17e239_75484135 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '10903427625915107b0d0131_18949820';
?>
		<h2> 
			<button type="button" class="btn btn-success" id="create-btn">
				<span class="glyphicon glyphicon-plus-sign"></span> Create 
			</button>
		</h2>
		<div id="create-form">
			<div class="form-group row">
				<div class="col-sm-12">
					<ul class="nav nav-tabs">
						<li role="presentation" id="nav-basic"><a href="#"><b>Basic</b></a></li>
						<li role="presentation" id="nav-submit-file"><a href="#"><b>Local File</b></a></li>
						<li role="presentation" id="nav-get-src"><a href="#"><b>Get Src</b></a></li>
						<li role="presentation" id="nav-html"><a href="#"><b>HTML</b></a></li>
						<li role="presentation" id="nav-html-batch"><a href="#"><b>HTML Bath</b></a></li>
					</ul>
				</div>
			</div>
			<div class="form-group row" id="aim-submit-file">
				<label class="col-sm-1" for="input-file">Local File</label>
				<div class="col-sm-3">
					<input type="file" id="input-file" value="select file"></input>
				</div>
				<div class="col-sm-3">
					<div class="input-group">
						<div class="input-group-addon">
							Alias
						</div>
						<input type="text" class="form-control" id="file-sumbit-alias-name" autocomplete="off">
					</div>
				</div>
				<div class="col-sm-2 pull-right">
				<button class="btn btn-primary pull-right" type="button" disabled="disabled">
					<span class="glyphicon glyphicon-flash"></span><b> Insert</b>
				</button>
				</div>
			</div>
			<div class="form-group row" id="aim-get-src">
				<label class="col-sm-1" for="src-uri">Auto Get Src</label>
				<div class="col-sm-3">
					<input type="url" class="form-control" id="src-uri" placeholder="Input Src URI">
				</div>
				<div class="col-sm-2">
					<div class="input-group has-feedback">
						<div class="input-group-addon">
							Max-CT
						</div>
						<input type="number" class="form-control" id="max-connect-time" aria-describedby="max-connect-timeStatus"  placeholder="Seconds" value="30">
						<span class="form-control-feedback" aria-hidden="true">S</span>
					    <span id="max-connect-timeStatus" class="sr-only">(second)</span>
					</div>
				</div>
				<div class="col-sm-2">
					<div class="input-group has-feedback">
						<div class="input-group-addon">
							MaxRT
						</div>
						<input type="number" class="form-control" id="max-transfer-time" aria-describedby="max-transfer-timeStatus" placeholder="Seconds" value="90">
						<span class="form-control-feedback" aria-hidden="true">S</span>
					    <span id="max-transfer-timeStatus" class="sr-only">(second)</span>
					</div>
				</div>
				<div class="col-sm-2">
					<div class="input-group">
						<div class="input-group-addon">
							Alias
						</div>
						<input type="text" class="form-control" id="src-alias-name" autocomplete="off">
					</div>
				</div>
				<div class="col-sm-2">
					<input class="btn btn-default" type="button" value="Run">
					<button class="btn btn-primary pull-right" type="button" disabled="disabled">
						<span class="glyphicon glyphicon-flash"></span><b> Insert</b>
					</button>
				</div>
			</div>
			<div id="aim-html">
				<div class="form-group row">
					<label for="html" class="col-sm-1 control-label">HTML</label>
					<div class="col-sm-5">
						<input type="url" class="form-control" id="html" placeholder="Input HTML URI">
					</div>
					<div class="col-sm-3">
						<div class="input-group">
							<div class="input-group-addon" title="X-Forwordedfor">
								XFF
							</div>
							<input type="text" class="form-control" id="html-xff" autocomplete="off" value="auto">
						</div>
					</div>
					<div class="col-sm-3">
						<div class="input-group">
							<div class="input-group-addon" title="Client IP">
								ClientIP
							</div>
							<input type="text" class="form-control" id="html-client-ip" autocomplete="off" value="auto">
						</div>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-3">
						<div class="input-group">
							<div class="input-group-addon">
								Referer
							</div>
							<input type="text" class="form-control" id="html-referer" autocomplete="off" value="null">
						</div>
					</div>
					<div class="col-sm-3">
						<div class="input-group">
							<div class="input-group-addon" title="proxy">
								Proxy
							</div>
							<input type="text" class="form-control" id="html-proxy" autocomplete="off" value="null">
						</div>
					</div>
					<div class="col-sm-3">
						<div class="input-group">
							<div class="input-group-addon" title="useragent">
								UA
							</div>
							<input type="text" class="form-control" id="html-ua" autocomplete="off" value="default">
						</div>
					</div>
					<div class="col-sm-3">
						<div class="input-group has-feedback">
							<div class="input-group-addon">
								MaxRT
							</div>
							<input type="number" class="form-control" id="html-rt" aria-describedby="html-trStatus" placeholder="Seconds" value="30">
							<span class="form-control-feedback" aria-hidden="true">S</span>
							<span id="html-rtStatus" class="sr-only">(second)</span>
						</div>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-3">
						<div class="input-group">
							<div class="input-group-addon">
								Title
							</div>
							<input type="text" class="form-control" id="html-title" autocomplete="off">
						</div>
					</div>
					<div class="col-sm-5">
						<div class="input-group">
							<div class="input-group-addon">
								Summary
							</div>
							<input type="text" class="form-control" id="html-summary" autocomplete="off">
						</div>
					</div>
					<div class="col-sm-2">
						<div class="input-group">
							<div class="input-group-addon">
								Icon
							</div>
							<div class="form-control"></div>
							<div class="input-group-addon"><input type="checkbox" id="html-icon-need"></div>
						</div>
					</div>
					<div class="col-sm-1">
						<button class="btn btn-default pull-right" type="button">
							<span class="glyphicon glyphicon-fire"></span><b> Run</b>
						</button>
					</div>
					<div class="col-sm-1">
						<button class="btn btn-primary pull-right" type="button" disabled="disabled">
							<span class="glyphicon glyphicon-flash"></span><b> Insert</b>
						</button>
					</div>
				</div>
			</div>
			<div id="aim-html-batch">
				<div class="form-group row">
					<label for="html-batch" class="col-sm-1 control-label">HTML Batch</label>
					<div class="col-sm-11">
						<textarea id="html-bath" class="form-control" rows="2" placeholder="Break HTML URIs By Enter;"></textarea>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-5">
						<div class="input-group">
							<div class="input-group-addon">
								Referer
							</div>
							<input type="text" class="form-control" id="html-batch-referer" autocomplete="off" value="null">
						</div>
					</div>
					<div class="col-sm-3">
						<div class="input-group">
							<div class="input-group-addon" title="X-Forwordedfor">
								XFF
							</div>
							<input type="text" class="form-control" id="html-batch-xff" autocomplete="off" value="auto">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="input-group">
							<div class="input-group-addon" title="proxy">
								Proxy
							</div>
							<input type="text" class="form-control" id="html-batch-proxy" autocomplete="off" value="null">
						</div>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-5">
						<div class="input-group">
							<div class="input-group-addon" title="useragent">
								UA
							</div>
							<input type="text" class="form-control" id="html-batch-ua" autocomplete="off" value="default">
						</div>
					</div>
					<div class="col-sm-3">
						<div class="input-group">
							<div class="input-group-addon" title="Client IP">
								ClientIP
							</div>
							<input type="text" class="form-control" id="html-batch-client-ip" autocomplete="off" value="auto">
						</div>
					</div>
					<div class="col-sm-2">
						<div class="input-group has-feedback">
							<div class="input-group-addon">
								MaxRT
							</div>
							<input type="number" class="form-control" id="html-batch-rt" aria-describedby="html-batch-trStatus" placeholder="Seconds" value="30">
							<span class="form-control-feedback" aria-hidden="true">S</span>
							<span id="html-batch-rtStatus" class="sr-only">(second)</span>
						</div>
					</div>
					<div class="col-sm-1">
						<button class="btn btn-default pull-right" type="button">
							<span class="glyphicon glyphicon-fire"></span><b> Run</b>
						</button>
					</div>
					<div class="col-sm-1">
						<button class="btn btn-primary pull-right" type="button" disabled="disabled">
							<span class="glyphicon glyphicon-flash"></span><b> Insert</b>
						</button>
					</div>
				</div>
				<div class="form-group row">
					<?php $_smarty_tpl->_subTemplateRender("file:HTML_batch.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

				</div>
			</div>
			<form action="backecd.php" method="post" target="createItemFrame">
				<div class="form-group row">
				 	<label for="job-prefix" class="col-sm-1 control-label">Job Prefix</label>
					<div class="col-sm-5">
					   <div class="input-group">
					   	<div class="input-group-btn">
					   	  <button class="btn btn-default">
					   		<span class="glyphicon glyphicon-arrow-left"></span> Clean
					   	  </button>
					   	</div>
					   	<input type="text" class="form-control" id="job-prefix" autocomplete="off" placeholder="Input Job Prefix;">
					   	<div class="input-group-btn">
					   	  <button class="btn btn-default">
							Revok <span class="glyphicon glyphicon-arrow-right"></span> 
						  </button>
					   	</div>
					   </div>
					</div>
					<div class="col-sm-4">
					   <div class="input-group">
					   	<div class="input-group-btn">
					   	  <button type="button" class="btn btn-default" id="job-prefix-fast-insert">
					   		<span class="glyphicon glyphicon-chevron-left"></span> Insert
					   	  </button>
					   	</div>
					   	<input class="form-control" id="job-prefix-usual" list="job-prefix-usual-list" autocomplete="off" placeholder="Usual Prefix"/>
						<datalist id="job-prefix-usual-list">
						</datalist>
					   	<div class="input-group-btn">
							<button type="button" class="btn btn-default" id="job-prefix-add">
								<span class="glyphicon glyphicon-plus"></span> Add
							</button>
							<button type="button" class="btn btn-default" id="job-prefix-rm">
								<span class="glyphicon glyphicon-minus"></span> Rm
							</button>
					   	</div>
					   </div>
					</div>
				 	<div class="col-sm-2">
						<div class="input-group">
							<input type="button" class="form-control btn btn-default" value="Rember Prefix"></input>
							<div class="input-group-addon"><input type="checkbox" id="job-prefix-rember"></div>
						</div>
				 	</div>
				 </div>

				 <div class="form-group row">
				 	<label for="job" class="col-sm-1 control-label">Job Name</label>
					<div class="col-sm-5">
						<div class="input-group">
							<div class="input-group-btn">
								<button class="btn btn-default">
								<span class="glyphicon glyphicon-arrow-left"></span> Clean
								</button>
							</div>
							<input type="text" class="form-control" id="job" autocomplete="off" placeholder="Input Job Name;">
							<div class="input-group-btn">
								<button class="btn btn-default">
									Revok <span class="glyphicon glyphicon-arrow-right"></span> 
								</button>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
					   <div class="input-group">
					   	<div class="input-group-btn">
					   	  <button type="button" class="btn btn-default" id="job-fast-insert">
					   		<span class="glyphicon glyphicon-chevron-left"></span> Insert
					   	  </button>
					   	</div>
					   	<input class="form-control" id="job-usual" list="job-usual-list" autocomplete="off" placeholder="Usual Job Name"/>
						<datalist id="job-usual-list">
						</datalist>
					   	<div class="input-group-btn">
							<button type="button" class="btn btn-default" id="job-add">
								<span class="glyphicon glyphicon-plus"></span> Add
							</button>
							<button type="button" class="btn btn-default" id="job-rm">
								<span class="glyphicon glyphicon-minus"></span> Rm
							</button>
					   	</div>
					   </div>
					</div>
				 	<div class="col-sm-2">
						<div class="input-group">
							<input type="button" class="form-control btn btn-default" value="Rember Name"></input>
							<div class="input-group-addon"><input type="checkbox" id="job-rember"></div>
						</div>
				 	</div>
				 </div>

				 <div class="form-group row">
				 	<label for="url" class="col-sm-1 control-label">URL</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-btn">
								<button class="btn btn-default">
								<span class="glyphicon glyphicon-arrow-left"></span> Clean
								</button>
							</div>
							<input type="url" class="form-control" id="url" autocomplete="off" placeholder="Input URL;">
							<div class="input-group-btn">
								<button class="btn btn-default">
									Revok <span class="glyphicon glyphicon-arrow-right"></span> 
								</button>
							</div>
						</div>
					</div>
				 	<div class="col-sm-2">
						<div class="input-group">
							<input type="button" class="form-control btn btn-default" value="Rember URL"></input>
							<div class="input-group-addon"><input type="checkbox" id="url-rember"></div>
						</div>
				 	</div>
				 </div>
				 <div class="form-group row">
				 	<label for="url" class="col-sm-1 control-label">Fetch Info</label>
					<div class="col-sm-1">
						<button class="btn btn-default pull-right" type="button">
							<span class="glyphicon glyphicon-fire"></span><b> Run</b>
						</button>
					</div>
					<div class="col-sm-3">
						<div class="input-group">
							<div class="input-group-addon">
								Title
							</div>
							<input type="text" class="form-control" id="url-title" autocomplete="off">
						</div>
					</div>
					<div class="col-sm-5">
						<div class="input-group">
							<div class="input-group-addon">
								Summary
							</div>
							<input type="text" class="form-control" id="url-summary" autocomplete="off">
						</div>
					</div>
					<div class="col-sm-2">
						<div class="input-group">
							<div class="input-group-addon">
								Icon
							</div>
							<div class="form-control"></div>
							<div class="input-group-addon"><input type="checkbox" id="url-icon-need"></div>
						</div>
					</div>

				 </div>
				<div class="form-group row">
					<label for="start-time" class="col-sm-1 control-label">Time info</label>
					<div class="col-sm-4">
						<div class="input-group">
							<div class="input-group-addon">Start</div>
							<input type="datetime-local" class="form-control" autocomplete="off" id="start-time">
							<div class="input-group-btn">
							   <button id="time-refresh" class="btn btn-default" type="button"> Refresh</button>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="input-group">
							<div class="input-group-addon">End</div>
							<input type="datetime-local" class="form-control" autocomplete="off" id="end-time">
							<div class="input-group-btn">
							   <button id="time-tomorrow" class="btn btn-default" type="button"> Tomorrow</button>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="input-group">
							<div class="input-group-addon">Crontab</div>
							<input type="text" class="form-control" id="crontab" autocomplete="off" placeholder="* * * * *">
							<div class="input-group-addon">New</div>
							<div class="input-group-addon"><input type="checkbox" id="crontab-new"></div>
						</div>
					</div>
				</div>
				<div class="form-group row">
				   <label for="discription" class="col-sm-1 control-label">Discription</label>
				   <div class="col-sm-11">
				   	<textarea id="discription" class="form-control" rows="3" placeholder="Short & Power..."></textarea>
				   </div>
				</div>
				<div class="form-group row">
					<label for="nice" class="col-sm-1 control-label">Other</label>
					<div class="col-sm-2">
						<div class="input-group">
							<div class="input-group-addon">Nice</div>
							<input type="number" class="form-control" id="nice" autocomplete="off" placeholder="0" value="0">
						</div>
					</div>
					<div class="col-sm-9">
						<button type="submit" class="btn btn-info btn-lg pull-right">
							<span class="glyphicon glyphicon-send"></span> Submit
						</button>
					</div>
				</div>
			</form>
		</div>
		<iframe name="createItemFrame" style="display:none;"></iframe>
<?php }
}
