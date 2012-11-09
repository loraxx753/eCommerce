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
	$('#editBox').dialog({
		autoOpen: false,
		draggable: false,
		resizable: false,
		width: 600,	
		buttons: {
			'Edit' : function(e) {editProduct(e);},
		},
		beforeClose: function(event, ui) { 
			var action = $('#editArea').attr('action');
			var exploded = action.split('/');
			exploded.pop();
			$('#editArea input').val('');
			$('#editArea textarea.product_description_textarea').val('');
			$('#editArea input[name=feat]').prop('checked', false);
		},
		modal: true,
		title: 'Edit'
	})

	$('#login').on('click', function (){
		$('#loginBox').dialog('open');
	});
	$('#regLink').on('click', function(e) {
		$('#regBox').dialog('open');
	});
	$('.editLink').on('click', function(e){
		e.preventDefault();
		$('.success').remove();
		var href = $(this).attr('href');
		$.get(href, function(data) {
			var action = $('#editArea').attr('action');
			$('#editArea').attr('action', action+"/"+data.ProductID);
			$('#editArea input[name=Product_Name]').val(data.Product_Name);
			$('#editArea input[name=SKU]').val(data.SKU);
			$('#editArea textarea.product_description_textarea').val(data.Product_Description);
			$('#editArea input[name=Stock]').val(data.Stock);
			$('#editArea input[name=Weight]').val(data.Product_Weight);
			$('#editArea input[name=Product_Price]').val(data.Product_Price);
			$('#editArea input[name=Size]').val(data.Product_Size);
			if(data.Featured == 1)
			{
				$('#editArea input[name=feat]').prop('checked', true);
			}

		}, 'json');
		$('#editBox').dialog('open');
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
	function editProduct(e){
		var href = $('#editArea').attr('action');

		var obj = {
			'Product_Name'  		: $('#editArea input[name=Product_Name]').val(),
			'SKU' 					: $('#editArea input[name=SKU]').val(),
			'Product_Description'   : $('#editArea textarea.product_description_textarea').val(),
			'Stock' 				: $('#editArea input[name=Stock]').val(),
			'Product_Cost' 			: $('#editArea input[name=Product_Cost]').val(),
			'Product_Price' 		: $('#editArea input[name=Product_Price]').val(),
			'Weight' 				: $('#editArea input[name=Weight]').val(),
			'Size' 					: $('#editArea input[name=Size]').val(),
			'feat' 					: $('#editArea input[name=feat]').val()
		};


		$.post(href, obj, function(data){
			if(data.success)
			{
				$('#editBox').dialog('close');
				$('#manage_header').after("<p class='success'>"+data.success+"</p>");
			}
			else
			{
				$('#editBox p.error').remove();
				for(i in data.error)
				{
					$('#edit').before("<p class='error'>"+data.error[i]+"</p>");
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
			$this.closest('.product_snapshot').remove();
			if($('.product_snapshot').length == 0)
			{
				$('.page_header').after('<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert">×</button><strong>Missing Something?</strong> <p>You have no products!</p></div>');
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
