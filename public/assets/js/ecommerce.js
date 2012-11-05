$(document).ready(function() {
	$('#loginBox').dialog({
		autoOpen: false,
		draggable: false,
		resizable: false,
		width: 400,	
		buttons: {
			'Sign In' : function(e) {signin(e);},
		},
		modal: true,
		title: 'Log-In'
	});
	$('#login').on('click', function (){
		console.log('clicked');
		$('#loginBox').dialog('open');
	});
	function signin() {
		console.log('save');
	};	
});
