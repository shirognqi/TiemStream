$(document).ready(function(){
	getStartEndTime();
	createBehaviourInit();
	remberPrefixInit();
	fastCleanInit();
	revokInit();
	resetTime();
	navInit();
	initFastInsert();
}); 


$(window).unload(function(){
	remberInitWhenClose(); 
});
