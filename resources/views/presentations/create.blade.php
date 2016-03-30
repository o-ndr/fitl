@extends ('layouts.master')

@title('title', 'Submit a Presentation Proposal')

@section('content')

<div class="page-header">
	<h1>Submit a presentation proposal</h1>
</div>

{!! Form::model($presentation, ['action' => 'PresentationController@store']) !!}


<div class="form-group">
	{!! Form::label('presentation_title', 'What is the title of your presentation?') !!}
	{!! Form::text('presentation_title', '', ['class' => 'form-control']) !!}
 </div>

 <div class="form-group">
	{!! Form::label('synopsis', 'Brief synopsis of your presentation') !!}
	{!! Form::textarea('synopsis', '', ['class' => 'form-control']) !!}
 </div>

 <div class="form-group">
	{!! Form::label('conference_track', 'Select the topic category that best fits your proposal') !!}
	{!! Form::textarea('conference_track', '', ['class' => 'form-control']) !!}
 </div>

 <button class="btn btn-success" type="submit">Submit Your Proposal</button>

{!! Form::close() !!}

@endsection