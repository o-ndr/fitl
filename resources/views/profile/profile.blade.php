@extends('layouts.master')

@section('title', 'My Profile')

@section('content')
<div class="page-header">
	<h1>My Profile</h1>
</div>

@if (Auth::user()->hasRole('member') )
	<div class="alert alert-info">User is a member</div>
@endif

@if (Auth::user()->hasRole('admin') )
	<div class="alert alert-info">User is an admin</div>
@endif

<h2>Roles</h2>
<ul>
	@foreach (Auth::user()->roles as $role)
		<li>{{ $role->name }}</li>
	@endforeach
</ul>


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