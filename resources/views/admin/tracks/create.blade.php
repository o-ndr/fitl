@extends ('layouts.admin')

@section ('title', 'Create a Presentation Track')

@section('content')

<div class="page-header">
	<h1>Create a presentation track</h1>
</div>

{!! Form::model($track, ['route' => 'admin.tracks.store']) !!}

@include('admin.tracks.partials.object_form')

<button class="btn btn-success" type="submit">Create Track</button>

{!! Form::close() !!}

@endsection