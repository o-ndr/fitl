@extends ('layouts.master')

@section ('title', 'Presentations of the following type: ' . $type->type)

@section('content')


<div class="row">
	<div class="col-sm-9">

		<div class="page-header">
				<a href="{{ url('presentations/create') }}" class="btn btn-success pull-right">+ Presentation Proposal</a>
				<h1>{{ $type->type }}</h1>
		</div>

		@include('types.partials.types')


	</div><!-- /.col-sm-9 -->

@include('shared.presentations_sidebar')
	
</div><!-- /.row -->

@endsection