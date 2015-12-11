$(document).ready(function(){
	$('span').hide();
	$('p').click(function(){
		var sp = $(this).siblings('span');
		$(sp).slideToggle("slow");
	})
});