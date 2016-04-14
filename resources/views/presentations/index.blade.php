@extends ('layouts.master')

@section('title', 'All Submissions')

@section('content')

<div class="row">
	<div class="col-sm-9">

		<div class="page-header">
				<a href="{{ url('presentations/create') }}" class="btn btn-success pull-right">+ Presentation Proposal</a>
				<h1>All submitted presentation proposals</h1>
		</div>

		@include('presentations.partials.presentations')

	</div><!-- /.col-sm-9 -->

	@include('shared.presentations_sidebar')

</div><!-- /.row -->

<div class="elevator-button">Back to Top</div>



<script>
// Elevator script included on the page, already.

window.onload = function() {
  var elevator = new Elevator({
    element: document.querySelector('.elevator-button'),
    duration: 1000 // milliseconds
  });
}
</script>


@endsection
