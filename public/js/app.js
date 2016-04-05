$('form.delete-object').submit(function(e) {

	var deleteConfirmed = confirm('Are you sure you want to delete this?');

	// if "true", submission wil be processed
	// if "false", submission will be halted
	return deleteConfirmed;

});

// toggle rating edit form when "edit" buttons are clicked
$('.edit-object').click(function(e) {
	var $ratingItem = $(this).closest('li');
	var $ratingForm = $ratingItem.find('form.edit-object-form');
	$ratingForm.toggleClass('hide');
});