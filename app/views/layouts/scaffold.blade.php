<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	{{HTML::style('css/bootstrap.min.css')}}
	{{HTML::style('css/main.css')}}
</head>
<body>
	
	<?php $user = Auth::user(); ?>
	<div class="header">
	<div class="container">
		<div class="navbar navbar-default">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ URL::to('/') }}">Pitch.XXX</a>
			</div>
			<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
			<?php if ($user): ?>
				<?php if ($user->role == 'entrepreneur'): ?>
					<li><a href="{{ URL::to('profile') }}">Profile</a></li>
				<?php elseif ($user->role == 'vc'): ?>
					<li><a href="{{ URL::to('winners') }}">Winners</a></li>
				<?php elseif ($user->role == 'admin'): ?>
					<li><a href="{{ URL::to('admin') }}">Admin Page</a></li>
				<?php else: ?>
					<li><a href="{{ URL::to('rateNext') }}">Rate Pitches</a></li>
				<?php endif ?>
			<?php endif ?>
			<li><a href="{{ URL::to('vcs') }}">Investors</a></li>
			<li><a href="{{ URL::to('faq') }}">FAQ</a></li>
			<li><a href="{{ URL::to('contact') }}">Contact</a></li>
			</ul>
			<!-- Right side -->
			<ul class="nav navbar-nav navbar-right">
				<?php if ($user): ?>
					<li><a href="{{ URL::to('logout') }}">Logout</a></li>
				<?php else: ?>
					<li><a href="{{ URL::to('signup') }}">Sign Up</a></li>
					<li><a href="{{ URL::to('login') }}">Login</a></li>
				<?php endif; ?>
			</ul>
			</div>
		</div>
	</div>
	</div>
	<!-- TOP MENU END -->
			
	<!-- Container -->
	<div class="container">
		<!-- Success-Messages -->
		@if ($message = Session::get('success'))
		<div class="alert alert-success alert-block">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<h4>Success</h4>
			{{{ $message }}}
		</div>
		@elseif (Session::has('message'))
		<div class="flash alert">
			<p>{{ Session::get('message') }}</p>
		</div>
		@endif

		<!-- Content -->
		<div class="content">
		@yield('main')
		</div>
	</div>

	<div class="footer">
		<div class="copyright">
			© Copyright 2013 Pitch.XXX Inc.
		</div>
	</div>
<script src="{{asset('js/bootstrap.js')}}"></script>
<script>
  $(function() {
    var tooltips = $( "[title]" ).tooltip();
  });
 </script>
<!-- Modal -->
</body>
</html>