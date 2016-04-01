@extends ('layouts.master')

@section ('title', 'Submit a Presentation Proposal')

@section('content')

<div class="page-header">
	<h1>Submit a presentation proposal</h1>
</div>

{!! Form::model($presentation, ['action' => 'PresentationController@store']) !!}

@include('presentations.partials.object_form')

<button class="btn btn-success" type="submit">Submit Your Proposal</button>

{!! Form::close() !!}

@endsection