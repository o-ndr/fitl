<hr>

<h2>Reviewer Rating</h2>

@include('presentations.ratings.partials.create')

<hr>

<ul class="list-group">
@foreach ($object->ratings as $rating)
	<li class="list-group-item">
		<div class="text-muted">
			<small>{{ $rating->created_at->diffForHumans() }}</small>
		</div>
		<p>{{ $rating->rating_by_reviewer }}</p>
		<div class="clearfix">
			<button class="edit-object btn btn-info btn-xs pull-left">edit</button>
			@include('presentations.ratings.partials.delete')
		</div>

		@include('presentations.ratings.partials.edit')
	</li>
@endforeach
</ul>