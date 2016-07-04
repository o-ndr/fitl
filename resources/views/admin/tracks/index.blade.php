@extends ('layouts.admin')

@section('title', 'Presentation Tracks')

@section('content')
<div class="page-header">
		<a href="{{ route('admin.tracks.create') }}" class="btn btn-success pull-right">+ Presentation Track</a>
		<h1>All Presentation Tracks</h1>
</div>

<div class="list-group">


@foreach ($tracks as $track)
<div class="list-group-item">
	<h2 class="list-group-item-heading">{{ $track->track_name }}</h2>
	<p class="list-group-item-text">
		<a href="{{ route('admin.tracks.edit', [$track->id]) }}">edit</a>
	</p>
</div>
@endforeach
</div>

@endsection