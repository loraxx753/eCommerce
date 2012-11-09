// Once the document has loaded
$(document).ready(function() {
	$('#addBox').dialog({
		autoOpen: false,
		draggable: false,
		resizable: false,
		width: 300,	
		buttons: {
			'Ok' : function(e) {$("#addBox").dialog('close')},
		},
		modal: true,
		title: 'Success'
	});
	// Gotta cature the link when it get's clicked
	// Don't think there's a class on that button, so have to use a parent.
	$('.add_to_cart a').click(function(event) {
		// Add the event thing up there to capture the actual event
		// Now we need to stop that link from going to that page (the page refresh thing)
		event.preventDefault();
		// So, now that the event is stopped, get where it was trying to go to
		var location = $(this).attr('href');

		// And now preform an ajax reques that will go to that url all non-reloady like
		// Since it's a get request, use the $.get() function
		$.get(location, function(data) {
			console.log('here');
			$('#addBox').dialog('open');
			// This is what you want to happen once the request has finished
			// alert('item added');
		});
	});
});