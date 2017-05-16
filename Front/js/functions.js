/**
 *
 *  自动获取创建任务的起止时间;
 * 
 */
var getFormatedDataString = function(day){
		var format = "";
		format += day.getFullYear()+"-";
		format += (day.getMonth()+1)<10?"0"+(day.getMonth()+1):(day.getMonth()+1);
		format += "-";
		format += day.getDate()<10?"0"+(day.getDate()):(day.getDate());
		format += "T";
		format += day.getHours()<10?"0"+(day.getHours()):(day.getHours());
		format += ":";
		format += day.getMinutes()<10?"0"+(day.getMinutes()):(day.getMinutes());
		format += ":"
		format += "00";
		return format;
}
var todayStorage;
var getStartEndTime = function(daySpan){
	if(typeof daySpan === "number"){
		if(daySpan<=0 || daySpan>500){
		   daySpan = 1;
		}
	}else{
		daySpan = 1;
	}
	var today = new Date();
	todayStorage = today;
	dayInc = 0;
	hourInc= 0;
  var tomorrow = new Date();
	tomorrow.setDate(today.getDate()+daySpan);
	tomorrow.setHours(0);
	tomorrow.setMinutes(0);
    $("#start-time").val(getFormatedDataString(today));
    $("#end-time").val(getFormatedDataString(tomorrow));
}

/**
 *
 *	创建按钮的点击状态，依赖simpleStorage
 *
 *
 */
var createShowHide = function(){
	var createForm = $('#create-form');
	var createFormState = createForm.is(':visible');
	if(createFormState){
		simpleStorage.set("#create-form", "hide", {TTL: 1000*24*3600});
		createForm.hide(200);
	}else{
		simpleStorage.set("#create-form", "show", {TTL: 1000*24*3600});
		createForm.show(200);
	}
}

var getPrefixAndName = function(input, boxName){
	if(input.code == 0){
		var data = input.data;
		var box = $(boxName);
		var option;
		for(var i=0; i<input.count; i++){
			option = $('<option value="'+data[i]+'"></option>');
			box.append(option);
		}
	}
}
var initPrefix = function(input){
	getPrefixAndName(input, "#job-prefix-usual-list");
}
var initName = function(input){
	getPrefixAndName(input, "#job-usual-list");
}
var initPrefixAndNameFlag = true;
var initPrefixAndName = function(){
	if(initPrefixAndNameFlag){
		initPrefixAndNameFlag = false;	
	}else{
		return;
	}
	var ajaxFun = function(_method,callbackFun){
		$.ajax({
			type : "get",
			url : "jsonp.php",
			dataType : "jsonp",
			data : {action:"fast_rember",method:_method},
			jsonp: "callback",
			jsonpCallback:callbackFun
		});	
	};
	ajaxFun('getPrefix', "initPrefix");
	ajaxFun('getName', "initName");
}

var prefixAndNameAction = function(trigger){
	var addBtn = $("#"+trigger+'-add');
	var rmBtn = $("#"+trigger+'-rm');
	addBtn.bind('click',function(){
		var value = $("#"+trigger+'-usual').val();
		value = $.trim(value);
		if(value == ''){
			return;
		}
		var _data = {
			action : "fast_rember",
			method : 'setPrefix'
		}
		if(trigger == 'job'){
			_data['method'] = 'setName';
			_data['name'] 	= value;
		}else{
			_data['prefix'] = value;
		}
		$.ajax({
			type : "get",
			url : "jsonp.php",
			dataType : "jsonp",
			data : _data,
			jsonp: "callback",
			jsonpCallback:_data['method']
		});	
	});
	rmBtn.bind('click',function(){
		var value = $("#"+trigger+'-usual').val();
		value = $.trim(value);
		if(value == ''){
			return;
		}
		var _data = {
			action : "fast_rember",
			method : 'delPrefix'
		}
		if(trigger == 'job'){
			_data['method'] = 'delName';
			_data['name'] 	= value;
		}else{
			_data['prefix'] = value;
		}
		$.ajax({
			type : "get",
			url : "jsonp.php",
			dataType : "jsonp",
			data : _data,
			jsonp: "callback",
			jsonpCallback:_data['method']
		});	
	});
}
var addPrefixAndName = function(boxName, input){
	if(input.code==0){
		var box = $("#"+boxName+'-list');
		var opt = $('<option value="'+input.data+'"></option>');
		box.append(opt);
		$("#"+boxName).val('');
	}
}
var delPrefixAndName = function(boxName, input){
	if(input.code==0){
	
		$("#"+boxName+'-list').children('[value='+input.data+']').remove();
		$("#"+boxName).val('');
	}
}
var setPrefix = function(input){
	addPrefixAndName('job-prefix-usual',input);
}
var setName   = function(input){
	addPrefixAndName('job-usual',input);
}

var delName = function(input){
	delPrefixAndName('job-usual',input);
}
var delPrefix = function(input){
	delPrefixAndName('job-prefix-usual',input);
}

var initPrefixAndNameActionFlag = true;
var initPrefixAndNameAction = function(){
	if(initPrefixAndNameActionFlag){
		initPrefixAndNameActionFlag = false;	
	}else{
		return;
	}	
	prefixAndNameAction('job-prefix');
	prefixAndNameAction('job');
}

var _fastInsert = function(who){
	$("#"+who+'-fast-insert').click(function(){
		var value = $.trim($('#'+who+'-usual').val());
		if(value){
			$('#'+who).val(value);
		}
	});
}

var initFastInsert = function(){
	_fastInsert('job');
	_fastInsert('job-prefix');
}

var createBehaviourInit = function(){
	$("#create-btn").bind("click",function(){
		getStartEndTime();
		createShowHide();
		initPrefixAndName();
		initPrefixAndNameAction();
	});

	var showState = simpleStorage.hasKey("#create-form");
	if(showState){
		var showStateStr = simpleStorage.get("#create-form");
		if(showStateStr === "show"){
			$("#create-btn").click();
			initPrefixAndName();
			initPrefixAndNameAction();
		}
	}
}


var changeCheckBoxWhenMouseOver = function(obj){
	if(simpleStorage.get(obj.attr("id"))=== "checked"){
		obj.attr("checked",true);
		var insterStr = simpleStorage.get(obj.attr("id")+'-content');
		if((typeof insterStr) === 'string' && insterStr!==""){
			$("#"+obj.attr('id').replace('-rember','')).val(insterStr);
		}
	}
	obj.parent().mouseover(function(){
		obj.click();
		if(obj.is(':checked')){
			simpleStorage.set(obj.attr("id"), "checked", {TTL: 1000*24*3600*2});
			var str = $("#"+obj.attr('id').replace('-rember','')).val().trim();
			if(str != ""){
				simpleStorage.set(obj.attr("id")+'-content', str, {TTL: 1000*24*3600*2});
			}
		}else{
			simpleStorage.set(obj.attr("id"), "unchecked", {TTL: 1000*24*3600*2});
		}
	});
	obj.parent().prev().bind('click',function(){
		obj.click();
		if(obj.is(':checked')){
			simpleStorage.set(obj.attr("id"), "checked", {TTL: 1000*24*3600*2});
			var str = $("#"+obj.attr('id').replace('-rember','')).val().trim();
			if(str != ""){
				simpleStorage.set(obj.attr("id")+'-content', str, {TTL: 1000*24*3600*2});
			}
		}else{
			simpleStorage.set(obj.attr("id"), "unchecked", {TTL: 1000*24*3600*2});
		}
	});
}
var remberPrefixInit = function(){
	changeCheckBoxWhenMouseOver($("#job-prefix-rember"));
	changeCheckBoxWhenMouseOver($("#job-rember"));
	changeCheckBoxWhenMouseOver($("#url-rember"));
}

var changeCheckBoxWhenClose = function(obj){
	var str = $("#"+obj.attr('id').replace('-rember','')).val().trim();
	if(obj.is(':checked')){
		if(str != "" && (typeof str === 'string')){
		}else{
			str = "";
		}
	}
	simpleStorage.set(obj.attr("id")+'-content', str, {TTL: 1000*24*3600*2});
}
var remberInitWhenClose = function(){
	changeCheckBoxWhenClose($("#job-prefix-rember"));
	changeCheckBoxWhenClose($("#job-rember"));
	changeCheckBoxWhenClose($("#url-rember"));
}

var fastClean = function(obj){
	var fastCleanBtn = $("#"+obj.attr('id').replace('-rember','')).prev().children().eq(0);
	fastCleanBtn.bind('click',function(){	
		var insertStr = $("#"+obj.attr('id').replace('-rember','')).val();
		if(typeof insertStr === "string" && insertStr !== ""){
			simpleStorage.set(obj.attr("id")+'-revoke', insertStr, {TTL: 1000*24*3600*2});
		}
		$("#"+obj.attr('id').replace('-rember','')).val("");
		$("#"+obj.attr('id').replace('-rember','')).focus();
		return false;
	});
}

var fastCleanInit = function(){
	fastClean($("#job-prefix-rember"));
	fastClean($("#job-rember"));
	fastClean($("#url-rember"));
}
var revok = function(obj){
	var fastCleanBtn = $("#"+obj.attr('id').replace('-rember','')).next().children().eq(0);
	fastCleanBtn.bind('click',function(){
		var instertStr = simpleStorage.get(obj.attr("id")+'-revoke');
		if(typeof instertStr === "undefined"){
			instertStr = "";
		}
		$("#"+obj.attr('id').replace('-rember','')).val(instertStr);
		$("#"+obj.attr('id').replace('-rember','')).focus();
		return false;
	});
}
var revokInit = function(){
	revok($("#job-prefix-rember"));
	revok($("#job-rember"));
	revok($("#url-rember"));
}


var resetTime = function(){
	$("#time-refresh").bind('click', function(){
			getStartEndTime();
			return false;
	});
	$("#time-tomorrow").bind('click', function(){
		var tomorrow = new Date();
		tomorrow.setDate(todayStorage.getDate()+1);
		$("#end-time").val(getFormatedDataString(tomorrow));
	})
}

var navLock = false;

var navList = {
	0 : 'basic',
	1 : 'submit-file',
	2 : 'get-src',
	3 : 'html',
	4 : 'html-batch'
};
var hideNav = function(){
	var aimobj;
	for(var i in navList){
		 $("#nav-"+navList[i]).removeClass("active");
		if(i==0) continue;
		 aimobj = $("#aim-"+navList[i]);
		 aimobj.hide();
	}
}
var clickNav  = function(){
	for(var j in navList){
		navObj = $("#nav-"+navList[j]);
		navObj.attr('aimid','aim-'+navList[j]);
		navObj.bind('click',function(){
			simpleStorage.set("#nav-clicked", $(this).attr('id'), {TTL: 1000*24*3600});
			hideNav();
			$(this).addClass('active');
			if(navObj.attr('id') === 'nav-basic'){
				return;
			}
			$('#'+$(this).attr('aimid')).show();
		});
	}
}

var navInit = function(){
	hideNav();
	clickNav();
	var navClicked = simpleStorage.get("#nav-clicked");
	if(navClicked){
		$("#"+navClicked).click();
	}else{
		$("#nav-basic").click();
	}
}


var urlRunInit = function(){
	$("#url-run").bind('click', function(){
			var url = $("#url").val();
			if($.trim(url) == ''){
				return ;
			}
			var _data = {
				action	: 'spider',
				method	: 'getURLInfo',
				url		: url
			};
			$.ajax({
				type	: "post",
				url		: "jsonp.php",
				dataType: "jsonp",
				data	: _data,
				jsonp	: "callback",
				jsonpCallback:"getURLInfo"
			});	
	});
}
var getURLInfo = function(data){
	console.log(data);
}
