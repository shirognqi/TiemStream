<?php
/* Smarty version 3.1.30, created on 2017-05-12 01:31:39
  from "/var/www/html/joblist/Backend/smarty/templates/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5915107b2420e3_02920595',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bcc81179ec44c25cc94e34647ef682553c630ac7' => 
    array (
      0 => '/var/www/html/joblist/Backend/smarty/templates/index.tpl',
      1 => 1493265898,
      2 => 'file',
    ),
    '376bafdb9e7e31290b5b871bf4ad9ce474edff54' => 
    array (
      0 => '/var/www/html/joblist/Backend/smarty/templates/basic.tpl',
      1 => 1493267525,
      2 => 'file',
    ),
    'f0603cd38eb15a135386f9eed1a80eb4b12a00e8' => 
    array (
      0 => '/var/www/html/joblist/Backend/smarty/templates/create.tpl',
      1 => 1494493444,
      2 => 'file',
    ),
    '5ca8e48e6b7701a4952428bad7b3cdadd63cd605' => 
    array (
      0 => '/var/www/html/joblist/Backend/smarty/templates/HTML_batch.tpl',
      1 => 1493200593,
      2 => 'file',
    ),
    '43dcbab4eac049655a29cb0a750c40584277bdad' => 
    array (
      0 => '/var/www/html/joblist/Backend/smarty/templates/list.tpl',
      1 => 1492602030,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 600,
),true)) {
function content_5915107b2420e3_02920595 (Smarty_Internal_Template $_smarty_tpl) {
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
		<script src="Front/bootstrap/js/html5shiv.min.js"></script>
		<script src="Front/bootstrap/js/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<!-- Bootstrap end-->
		<link href="Front/css/index.css" rel="stylesheet">
</head>

<body>
	
	<div class="container">
		<h1>Time Stream <small> Enjoy The Smarty Day, 待我代码编成，娶你为妻可好 <b style="color:red;">狂龙~</b></small></h1>
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

		<h2>List <small>default order by create time.</small></h2>
<div class="table-responsive">
  <table class="table  table-hover table-condensed">
  	<thead>
		<th>Job Name</th>
		<th>Start/End Time</th>
		<th>Nice</th>
		<th>URL</th>
		<th>Title(Spider)</th>
		<th>Summery(Spider)</th>
		<th>Discription</th>
		<th>State</th>
	</thead>
	<tr>
		<td>Job Name</td>
		<td>Start/End Time</td>
		<td>Nice</td>
		<td>URL</td>
		<td>Title(Spider)</td>
		<td>Summery(Spider)</td>
		<td>Discription</td>
		<td>State</td>
	</tr>
	<tr>
		<td>Job Name</td>
		<td>Start/End Time</td>
		<td>Nice</td>
		<td>URL</td>
		<td>Title(Spider)</td>
		<td>Summery(Spider)</td>
		<td>Discription</td>
		<td>State</td>
	</tr>
  </table>
</div>

	</div>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="Front/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="Front/bootstrap/js/bootstrap.min.js"></script>
    <script src="Front/simpleStorage-master/simpleStorage.min.js"></script>
	<script src="Front/js/functions.js"></script>
    <script src="Front/js/index.js"></script>
</body>
</html>
<?php }
}
