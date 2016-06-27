<div class="col-sm-3">

	<h3>Presentation Types</h3>

	<div class="list-group">
	@foreach ($types as $type)
		<a class="list-group-item" href="{{ route('types.show', $type->id) }}">{{ $type->type }}</a>
	@endforeach
	</div>

	<h3>Presentation Tracks</h3>

	<div class="list-group">
	@foreach ($tracks as $track)
		<a class="list-group-item" href="{{ route('types.show', $type->id) }}">{{ $track->track }}</a>
	@endforeach
	</div>

</div><!-- /.col-sm-3 -->