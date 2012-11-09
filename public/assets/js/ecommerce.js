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
		$.get(LINK_BASE+"cart/total", function(total) {
			$('#subtotal_price').html(parseInt(total).toFixed(2));
		});
	}

	$('#review_form input[type=submit]').click(function(e) {
		e.preventDefault();
		$('.error').remove();
		var href = $('#review_form').attr('action');
		var obj = {
			'review' : $('#review_form textarea').val(),
			'rating' : parseInt($('#review_form input[type=text]').val())
		}
		var valid = true;

		if(isNaN(obj.rating))
		{
			$('#review_form').prepend('<div class="error alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button><strong>Hold Up!</strong> <p class="error">The rating has to be a number 0 - 5</p></div>');
			valid = false;
		}
		else
		{
			if(obj.rating > 5 || obj.rating < 0)
			{
				$('#review_form').prepend('<div class="error alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button><strong>Hold Up!</strong> <p>The rating has to be a number 0 - 5</p></div>');
				valid = false;				
			}
		}
		if(obj.review.length == 0)
		{
				$('#review_form').prepend('<div class="error alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button><strong>Hold Up!</strong> <p>There must be a review!</p></div>');
				valid = false;				
		}

		if(valid)
		{
			$.post(href, obj, function(data) {
				if(data.success)
				{
					var counter = 0;
					var stars = '';
					for(var x=0; x < 5; x++)
					{
						if(counter < obj.rating)
						{
							stars += '<li><i class="icon-star"></i></li>';
							counter++;
						}
						else
						{
							stars += '<li><i class="icon-star-empty"></i></li>';
						}
					}

					$('#review_set').prepend('<hr /><ul class="review_rating">'+stars+"</ul><p>"+obj.review+"</p><div class='review_user'><p>"+data.success+"</p></div>");
					$('#review_form').slideUp(function() {
						$('#review_form').after('<div class="success alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button><p><strong>Success!</strong> Thanks for the review!</p></div>');
					});
					$('#review_form textarea').val("");
					$('#review_form input type=[text]').val("");
				}
				else
				{
					$('#review_form').prepend('<div class="error alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button><strong>Hold Up!</strong> <p>Something went wrong!</p></div>');
				}
			}, 'json');
		}
	});

});
