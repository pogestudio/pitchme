<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	{{HTML::style('css/bootstrap.min.css')}}
	{{HTML::style('css/main.css')}}
	
	<!-- 
	Popup script
	-->
	<script>
	$(function() {
	var tooltips = $( "[title]" ).tooltip();
	});
	</script>
</head>
<body>
	
	<?php $user = Auth::user(); ?>
	<div class="landingHeader">
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
			<div class="content">
				<h1>Get your pitch in front of prominent investors.</h1>
			    <br />
			    <p>
			        You can have a chance at getting Your idea in front of a renowned investor, no matter where you are! At Pitch.XXX we filter pitches on a weekly interval and present two high potential pitches to a panel of investors. The best one, as well as one random from top 20. If they like it enough to hear more they'll contact you! So upload your pitch, pay the fee, and your pitch might be the one flashing in front of their eyes.
			    </p>
		    </div>
		    <button class="btn btn-lg btn-primary">Sign Up</button>
		</div>
	</div>

	<!-- TOP MENU END -->
	<div class="midSection">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<img src="{{asset('img/upload.png')}}" class="icon" alt="placeholder+image">
					<h2>Submit Your Pitch</h2>
					<p>Users are alloted pitch credits according to the user plan, where individual pitches can be uploaded.</p>
				</div>
				<div class="col-md-4">
					<img src="{{asset('img/arrows.png')}}" class="icon" alt="placeholder+image">
					<h2>Get Ranked</h2>
					<p>An expert panel judges and ranks all pitches and sorts the best to the top.</p>
				</div>
				<div class="col-md-4">
					<img src="{{asset('img/money.png')}}" class="icon" alt="placeholder+image">
					<h2>Get Investors</h2>
					<p>Investors and Venture Capitalists see the top ranked pitches and choose to invest in the ones they like.</p>
				</div>
			</div>
		</div>
	</div>

	<div class="lowerSection container">
		<div class="well">
			<h2>Sign up now to start submitting your pitch!</h2>
			<button class="btn btn-primary">Sign Up</button>
		</div>
	</div>
	<!-- Container -->
	<!-- <div class="lowerSection">
		<div class="container">
			<h1>Featured Investors:</h1>
			<img class="vcLogo" src="http://gcase.org/file.php?file=%2F1%2Fdfj.gif" alt="">
			<img class="vcLogo" src="http://gcase.org/file.php?file=%2F1%2Fdfj.gif" alt="">
			<img class="vcLogo" src="http://gcase.org/file.php?file=%2F1%2Fdfj.gif" alt="">
			<img class="vcLogo" src="http://gcase.org/file.php?file=%2F1%2Fdfj.gif" alt="">
		</div>
	</div> -->

	<!-- Contact -->
	<div class="footer">
		<div class="copyright">
			<h4>© Copyright 2013 Pitch.XXX Inc.</h4>
		</div>
	</div>
	
<script src="{{asset('js/bootstrap.js')}}"></script>
<!-- Modal -->
</body>
</html>