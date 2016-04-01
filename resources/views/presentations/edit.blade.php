@extends ('layouts.master')

@section ('title', 'Edit a Presentation Proposal')

@section('content')

<div class="page-header">
	<h1>Edit a presentation proposal</h1>
</div>

{!! Form::model($presentation, 
	[
		'action' => ['PresentationController@update', $presentation->id],
		'method' => 'put'
	]) !!}

@include('presentations.partials.object_form')

<button class="btn btn-success" type="submit">Update Your Proposal</button>

{!! Form::close() !!}

@include('presentations.partials.delete_object')

@endsection