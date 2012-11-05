var $loginDialog = $('#loginBox').dialog({
	autoOpen: false,
	draggable: false,
	resizable: false,
	width: 400,	
	buttons: {
		'Save' : function(e) {editMember(e);},
		'Cancel': function(e) {closeNotesDialog(e);}
	},
	modal: true
});

$('#login').on('click', function (){
	console.log('clicked, before open');
	$loginDialog.dialog('open');
	console.log('clicked, after open');
});