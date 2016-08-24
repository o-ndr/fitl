<!-- Header -->
		<nav class="navbar navbar-inverse navbar-static-stop">
  			<div class="container-fluid">
    			<!-- Brand and toggle get grouped for better mobile display -->
    			<div class="navbar-header">
      				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main_menu" aria-expanded="false">
        				<span class="sr-only">Toggle navigation</span>
        				<span class="icon-bar"></span>
        				<span class="icon-bar"></span>
        				<span class="icon-bar"></span>
      				</button>
      				<a class="navbar-brand" href="#">LocWorld Submissions Manager</a>
    			</div>
			    <!-- Collect the nav links, forms, and other content for toggling -->
    			<div class="collapse navbar-collapse" id="main_menu">
      				<ul class="nav navbar-nav">
      					<li><a href="{{ url('presentations') }}">{{ trans('shared/header.presentations_navigation_link') }}</a></li>
        				<li><a href="{{ url('about') }}">{{ trans('shared/header.about_navigation_link') }}</a></li>
        				<li><a href="{{ url('contact') }}">{{ trans('shared/header.contact_us_navigation_link') }}</a></li>        
      				</ul>

              @include('shared.user_actions')
              
              @include('shared.presentation_search_form')

    			</div><!-- /.navbar-collapse -->
  			</div><!-- /.container-fluid -->
		</nav>
		<!-- End of Header -->