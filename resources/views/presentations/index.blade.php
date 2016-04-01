@extends ('layouts.master')

@section('title', 'All Submissions')

@section('content')
<div class="page-header">
		<h1>All submitted proposals for LocWorld presentations</h1>
</div>

<div class="list-group">


@foreach ($objects as $presentation)
	<a href="{{ url('presentations', [$presentation->id]) }}" class="list-group-item">
	<h2 class="list-group-item-heading">{{ $presentation->presentation_title }}</h2>
	<p class="list-group-item-text">
		Submitted on {{ $presentation->created_at }}
	</p>
@endforeach
</div>

@endsection