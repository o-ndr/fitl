<h3>Add a Comment:</h3>
{!! Form::open(['route' => ['presentation.comments.store', $object->id]]) !!}

	@include('presentations.comments.partials.comment_form')

	<button type="submit" class="btn btn-success">Add your comment!</button>

{!! Form::close() !!}