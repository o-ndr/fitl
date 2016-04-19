<h3>Reviewer Rating:</h3>
{!! Form::open(['route' => ['presentation.ratings.store', $object->id]]) !!}

	@include('presentations.ratings.partials.rating_form')

	<button type="submit" class="btn btn-success">Add Rating</button>

{!! Form::close() !!}