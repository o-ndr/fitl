@extends ('layouts.admin')

@section ('title', 'Edit a Presentation Track')

@section('content')

<div class="page-header">
	<h1>Edit a presentation track</h1>
</div>

{!! Form::model($track, 
	[ 
		'route' => ['admin.tracks.update', $track->id],
		'method' => 'put'
	]
	) !!}

@include('admin.tracks.partials.object_form')

<button class="btn btn-success" type="submit">Save Changes</button>

{!! Form::close() !!}

@include('admin.tracks.partials.delete_object')

@endsection