 <div class="form-group">
	{!! Form::label('presentation_title', 'What is the title of your presentation?') !!}
	{!! Form::text('presentation_title', null, ['class' => 'form-control']) !!}
 </div>

 <div class="form-group">
	{!! Form::label('synopsis', 'Brief synopsis of your presentation') !!}
	{!! Form::textarea('synopsis', null, ['class' => 'form-control']) !!}
 </div>

 <div class="form-group">
	{!! Form::label('conference_track', 'Select the topic category that best fits your proposal') !!}
	{!! Form::textarea('conference_track', null, ['class' => 'form-control']) !!}
 </div>

 

 <div class="form-group">
 	{!! Form::label('type_id[]', 'Presentation type') !!}
 	{!! Form::select('type_id[]', 
 		$types,
 		$presentation->types->lists('id')->all(),
 		['multiple' => true, 'class' => 'form-control'] 		
 	) !!}
 </div>


<div class="form-group">
 	{!! Form::label('track_id[]', 'Conference track') !!}
 	{!! Form::select('track_id[]', 
 		$tracks,
 		$presentation->tracks->lists('id')->all(),
 		['multiple' => true, 'class' => 'form-control'] 		
 	) !!}
 </div>
 