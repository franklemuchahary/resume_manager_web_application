$(document).ready(function(){
	$('.sidebar-menu li').click(function(){
		$('.sidebar-menu li .active').removeClass('active');
		$(this).addClass('active');
	});
});