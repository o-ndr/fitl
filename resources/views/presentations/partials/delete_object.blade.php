<hr>

<h2>Delete this presentation:</h2>

{!! Form::open([
	'action' => ['PresentationController@destroy', $presentation->id],
	'method' => 'delete',
	'class' => 'delete-object'
]) !!}

	<button type="submit" class="btn btn-danger">DELETE this presentation!</button>

{!! Form::close() !!}