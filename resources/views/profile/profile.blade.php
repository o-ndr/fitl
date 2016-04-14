@extends('layouts.master')

@section('title', 'My Profile')

@section('content')
<div class="page-header">
	<h1>My Profile</h1>
</div>

<h2>Submitted Presentations</h2>

@include('presentations.partials.presentations', ['presentations' => $presentations])

<h2>Submitted Ratings</h2>

<ul class="list-group">
@foreach ($ratings as $rating)
	<li class="list-group-item">
		<div class="text-muted">
			<small>{{ $rating->created_at->diffForHumans() }}</small>
		</div>
		<p><small>Presentation:</small> <strong>{{ $rating->presentation->presentation_title }}</strong></p>
		<p>{{ $rating->rating_by_reviewer }}</p>
	</li>
@endforeach
</ul>

@endsection