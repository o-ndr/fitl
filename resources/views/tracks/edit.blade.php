@extends ('layouts.master')

@section ('title', 'Edit a Conference Track')

@section('content')

<div class="page-header">
	<h1>Edit a Conference Track</h1>
</div>

{!! Form::model($track,
 [ 
 	'route' => ['tracks.update', $track->id],
 	'method' => 'put' 
 ]
 ) !!}

@include('tracks.partials.object_form')

<button class="btn btn-success" type="submit">Save Changes</button>

{!! Form::close() !!}

@endsection