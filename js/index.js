
$(document).ready(function() {
	$('.button').click(function(){
		$('#login').css('-webkit-animation-name','hide_login');
		$('#login').css('transform', 'rotateY(180deg)');
		$('#register').css('-webkit-animation-name', 'show_register');
		$('#register').css('transform', 'rotateY(0deg)');
	});
	$('.button4').click(function(){
		$('#register').css('-webkit-animation-name', 'hide_register');
		$('#register').css('transform', 'rotateY(180deg)');
		$('#login').css('-webkit-animation-name','show_login');
		$('#login').css('transform', 'rotateY(0deg)');
	});
});