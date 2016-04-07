@extends ('layouts.master')

@section ('title', 'Presentations of the following type: ' . $type->type)

@section('content')

<div class="row">
	<div class="col-sm-9">

		<div class="page-header">
			<a href="{{ url('presentations/create') }}" class="btn btn-success pull-right">+ Presentation Proposal</a>
			<h1>Presentations of the following type: {{ $type->type }}</h1>
		</div>

		<div class="list-group">
			@foreach ($type->presentations as $presentation)
				<a href="{{ url('presentations', [$presentation->id]) }}" class="list-group-item">
					<h2 class="list-group-item-heading">{{ $presentation->presentation_title }}</h2>
					<p class="list-group-item-text">
						Submitted on {{ $presentation->created_at }}
					</p>
				</a>
			@endforeach
		</div>

	</div><!-- /.col-sm-9 -->

	@include('shared.presentations_sidebar')

</div><!-- /.row -->

@endsection