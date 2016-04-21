@extends ('layouts.master')

@section('title', 'All Tracks')

@section('content')

<div class="row">
	<div class="col-sm-9">

		<div class="page-header">
				<a href="{{ route('tracks.create') }}" class="btn btn-success pull-right">+ Conference Track</a>
				<h1>Conference tracks</h1>
		</div>

	<div class="list-group">
		@foreach ($tracks as $track)
			<div class="list-group-item">
				<h2 class="list-group-item-heading">{{ $track->track }}</h2>
				<p class="list-group-item-text">
					<a href="{{ route('tracks.edit', [$track->id]) }}">edit</a>
					Submitted on {{ $track->created_at }}
				</p>
			</div>
		@endforeach
	</div>

</div><!-- /.row -->

<div class="elevator-button">Back to Top</div>



<script>
// Elevator script included on the page, already.

window.onload = function() {
  var elevator = new Elevator({
    element: document.querySelector('.elevator-button'),
    duration: 1000 // milliseconds
  });
}
</script>


@endsection
