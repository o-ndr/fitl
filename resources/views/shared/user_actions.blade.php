
<ul class="nav navbar-nav navbar-right">

	@if ( Auth::check() )

		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"
			role="dropdown" aria-haspopup="true" aria-expanded="false">
			{{ Auth::user()->first_name }} <span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="{{ url('profile') }}">Profile</a></li>
				<li><a href="{{ url('logout') }}">Log out</a></li>
			</ul>
		</li>

	@else
		<li><a href="{{ action('Auth\AuthController@getLogin') }}">Log in</a></li>
		<li><a href="{{ action('Auth\AuthController@getregister') }}">Register</a></li>
	@endif

		@include('shared.language_switcher_nav')

</ul>
