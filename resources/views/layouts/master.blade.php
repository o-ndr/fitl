<!DOCTYPE html>
<html>
	<head>
		<title>@yield('title')</title>
		<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
		<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
	</head>
	<body>

		@include('shared.header')


		<div class="container">
			@include('shared.errors')
			@include('shared.message')
			@yield('content')
		</div>
		
		@include('shared.footer')

		<script src="{{ asset('js/jquery-2.2.2.js') }}"></script>
		<script src="{{ asset('js/bootstrap.js') }}"></script>
		<script src="{{ asset('js/app.js') }}"></script>
		<script src="{{ asset('js/bootstrap-rating-input.min.js') }}"></script>
	</body>
</html>