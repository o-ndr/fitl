@extends ('layouts.master')

@section ('title', 'Edit a Presentation Type')

@section('content')

<div class="page-header">
	<h1>Edit a presentation type</h1>
</div>

{!! Form::model($type, 
	[ 
		'route' => ['types.update', $type->id],
		'method' => 'put'
	]
	) !!}

@include('types.partials.object_form')

<button class="btn btn-success" type="submit">Save Changes</button>

{!! Form::close() !!}

@include('types.partials.delete_object')

@endsection