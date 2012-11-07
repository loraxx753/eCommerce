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

	$('form.form-search a').click(function(event) {
		event.preventDefault();
		var location = $(this).attr('href');
		// console.log(location);
		var query = $('form.form-search input').val();
		// console.log(query);
		var search = location + query;
		// console.log(search);
		window.location = search;
	});	
	$('form.form-search').on('submit', function(event) {
		event.preventDefault();
		// console.log('prevented');
		var location = $('form.form-search a').attr('href');
		// console.log(location);
		var query = $('input').val();
		// console.log(query);
		var search = location + query;
		// console.log(search);
		window.location = search;
	});
});
