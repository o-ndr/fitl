
	<h3>Presentation Tracks</h3>

	<div class="list-group">
	@foreach ($tracks as $track)
		<a class="list-group-item" href="{{ route('tracks.show', $track->id) }}">{{ $track->track_name }}</a>
	@endforeach
	</div>

