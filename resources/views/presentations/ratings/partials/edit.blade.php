{!! Form::model($rating,
	[
		'route' => ['presentation.ratings.update', $object->id, $rating->id],
		'method' => 'put',
		'class' => 'hide edit-ratingobject-form'
	]) !!}

	@include('presentations.ratings.partials.rating_form')

	<button type="submit" class="btn btn-info">Update the rating</button>

{!! Form::close() !!}