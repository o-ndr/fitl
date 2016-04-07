<div class="list-group">
	@foreach ($presentations as $presentation)
		<a href="{{ url('presentations', [$presentation->id]) }}" class="list-group-item">
		<h2 class="list-group-item-heading">{{ $presentation->presentation_title }}</h2>
		<p class="list-group-item-text">
			Submitted on {{ $presentation->created_at }}
		</p>
		</a>
	@endforeach
</div>