@extends ('layouts.admin')

@section ('title', 'Edit a Presentation Type')

@section('content')

<div class="page-header">
	<h1>Edit a presentation type</h1>
</div>

{!! Form::model($type, 
	[ 
		'route' => ['admin.types.update', $type->id],
		'method' => 'put'
	]
	) !!}

@include('admin.types.partials.object_form')

<button class="btn btn-success" type="submit">Save Changes</button>

{!! Form::close() !!}

@include('admin.types.partials.delete_object')

@endsection