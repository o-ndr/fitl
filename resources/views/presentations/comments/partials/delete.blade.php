{!! Form::open([
	'route' => ['presentation.comments.destroy', $object->id, $comment->id],
	'method' => 'delete',
	'class' => 'pull-left'
]) !!}

&nbsp;<button class="btn btn-danger btn-xs pull-left">delete</button>

{!! Form::close() !!}