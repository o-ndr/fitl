{!! Form::model($comment, 
	[
		'route' => ['presentation.comments.update', $object->id, $comment->id],
		'method' => 'put',
		'class' => 'hide edit-commentobject-form'
	]) !!}

	@include('presentations.comments.partials.comment_form')

	<button type="submit" class="btn btn-info">Update the comment</button>

{!! Form::close() !!}