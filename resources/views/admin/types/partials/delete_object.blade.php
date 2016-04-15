<hr>

<h2>Delete this type:</h2>

{!! Form::open([
	'route' => ['admin.types.destroy', $type->id],
	'method' => 'delete',
	'class' => 'delete-object'
]) !!}

	<button type="submit" class="btn btn-danger">DELETE this type!</button>

{!! Form::close() !!}