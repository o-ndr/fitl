$('form.delete-object').submit(function(e) {

	var deleteConfirmed = confirm('Are you sure you want to delete this?');

	// if "true", submission wil be processed
	// if "false", submission will be halted
	return deleteConfirmed;

});

// toggle rating edit form when "edit" buttons are clicked
$('.edit-ratingobject').click(function(e) {
	var $ratingItem = $(this).closest('li');
	var $ratingForm = $ratingItem.find('form.edit-ratingobject-form');
	$ratingForm.toggleClass('hide');
});


//  toggle comment edit forms when the edit buttons are clicked 
$('.edit-commentobject').click(function(e) {
	var $commentItem = $(this).closest('li');
	var $commentForm = $commentItem.find('form.edit-commentobject-form');
	$commentForm.toggleClass('hide');
});