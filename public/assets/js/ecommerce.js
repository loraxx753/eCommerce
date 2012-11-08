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
	$('#regBox').dialog({
		autoOpen: false,
		draggable: false,
		resizable: false,
		width: 400,	
		buttons: {
			'Register' : function(e) {register(e);},
		},
		modal: true,
		title: 'Register'
	});

	$('#login').on('click', function (){
		$('#loginBox').dialog('open');
	});
	$('#regLink').on('click', function(e) {
		$('#regBox').dialog('open');
	});
	function signin() {
		var href = $('#loginArea').attr('action');
		var obj = {
			'name' : $('#loginArea input[name=user]').val(),
			'pass' : $('#loginArea input[name=password]').val(),
		};

		$.post(href, obj, function(data) {
			if(data.success)
			{
				location.reload();
			}
			else
			{
				$('#loginBox p.error').remove();
				$('#loginArea').before("<p class='error'>"+data.error+"</p>")
			}
		}, 'json');

	};
	function register() {
		var href = $('#regArea').attr('action');
		var obj = {
			'name'       : $('#regArea input[name=name]').val(),
			'pass_alpha' : $('#regArea input[name=pass_alpha]').val(),
			'pass_beta'  : $('#regArea input[name=pass_beta]').val(),
			'email'      : $('#regArea input[name=email]').val()
		};

		$.post(href, obj, function(data) {
			if(data.success)
			{
				location.reload();
			}
			else
			{
				$('#regBox p.error').remove();
				for(i in data.error)
				{
					$('#regArea').before("<p class='error'>"+data.error[i]+"</p>")
				}
			}
		}, 'json');
	}	
});
