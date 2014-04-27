$(function() {

	$('.submenu').click(function() {
		$(this).next().slideToggle();
	});
	
	$('#formLogin').click(function() {
		$(this).next().slideToggle();
	});
	
	$('input:submit').button();

});
