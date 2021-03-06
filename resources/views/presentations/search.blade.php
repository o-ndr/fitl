@extends ('layouts.master')

@section('title', 'Search results for "' . $q . '"')

@section('content')

<div class="row">
	<div class="col-sm-9">

		<div class="page-header">
				<a href="{{ url('presentations/create') }}" class="btn btn-success pull-right">+ Presentation Proposal</a>
				<h1>Search results for "{{ $q }}"</h1>
		</div>

		@include('presentations.partials.presentations')

	</div><!-- /.col-sm-9 -->

	@include('shared.presentations_sidebar')

</div><!-- /.row -->

@endsection
