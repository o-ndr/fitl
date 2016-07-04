<hr>

<h2>Delete this track:</h2>

{!! Form::open([
	'route' => ['admin.tracks.destroy', $track->id],
	'method' => 'delete',
	'class' => 'delete-object'
]) !!}

	<button type="submit" class="btn btn-danger">DELETE this track!</button>

{!! Form::close() !!}