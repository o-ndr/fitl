{!! Form::open([
	'route' => ['presentation.ratings.destroy', $object->id, $rating->id],
	'method' => 'delete',
	'class' => 'pull-left'
]) !!}

&nbsp;<button class="btn btn-danger btn-xs pull-left">delete</button>

{!! Form::close() !!}