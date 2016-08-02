<hr>

<h2>Comments</h2>

@include('presentations.comments.partials.create')

<hr>

<ul class="list-group">
@foreach ($object->comments as $comment)
	<li class="list-group-item">
		<div class="text-muted">
			<small>{{ $comment->created_at->diffForHumans() }}</small>
		</div>
		<p>{{ $comment->comment_by_reviewer }}</p> 

		@if ($comment->canEdit() )
			<div class="clearfix">
				<button href="#" class="edit-commentobject btn btn-info btn-xs pull-left">edit</button>
				@include('presentations.comments.partials.delete')
			</div>

			@include('presentations.comments.partials.edit')
		@endif

	</li>
@endforeach
</ul>