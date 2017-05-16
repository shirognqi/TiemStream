$(document).ready(function(){
	getStartEndTime();
	createBehaviourInit();
	remberPrefixInit();
	fastCleanInit();
	revokInit();
	resetTime();
	navInit();
	initFastInsert();
	urlRunInit();
}); 


$(window).unload(function(){
	remberInitWhenClose(); 
});
