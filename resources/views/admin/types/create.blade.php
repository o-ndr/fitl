@extends ('layouts.admin')

@section ('title', 'Create a Presentation Type')

@section('content')

<div class="page-header">
	<h1>Create a presentation type</h1>
</div>

{!! Form::model($type, ['route' => 'admin.types.store']) !!}

@include('admin.types.partials.object_form')

<button class="btn btn-success" type="submit">Create Type</button>

{!! Form::close() !!}

@endsection