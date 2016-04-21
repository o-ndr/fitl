@extends ('layouts.master')

@section ('title', 'Create a Conference Track')

@section('content')

<div class="page-header">
	<h1>Create a Conference Track</h1>
</div>

{!! Form::model($track, ['route' => 'tracks.store']) !!}

@include('tracks.partials.object_form')

<button class="btn btn-success" type="submit">Create Track</button>

{!! Form::close() !!}

@endsection