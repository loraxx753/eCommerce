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

	$('.delete_product').click(function(e) {
		e.preventDefault();
		$this = $(this);
		var href = $this.attr('href');
		$.get(href, function() {
			$this.closest('.cart_item').remove();
			if($('.cart_item').length == 0)
			{
				$('.page_header').after("<p>You have no items in your cart</p>");
				$('#checkout').hide();
			}
			update_total();
		});
	});
	$('.update_product').click(function(e) {
		e.preventDefault();
		var href = $(this).attr('href');
		var quantity = $(this).closest('.additional_options').find('.quantity').val()
		$.get(href+quantity, function() {
			update_total();
		});
	});

	function update_total()
	{
		$.get(WEB_BASE+"cart/total", function(total) {
			$('#subtotal_price').html(parseInt(total).toFixed(2));
		});
	}

});
