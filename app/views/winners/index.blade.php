@extends('layouts.scaffold')
@section('main')
<style>
	.blue {
		background: blue;
	}
</style>

 <?php 

		$winnerRounds = DB::table('winners')
		->orderBy('round', 'desc')
		->groupBy('round')
		->get();
		?>


@if (!empty($winnerRounds))
<div class="container">

		<!-- each round start -->
	
	@foreach ($winnerRounds as $winnerRound)
		<div class="winnersListHeader page-header">
			<h1>Week {{ $winnerRound->round }}</h1>
		</div>
		<div class="winnerList">
		<!-- each pitch in round start -->
		<?php 

		$winners = DB::table('winners')
		->where('round','=',$winnerRound->round)
		->orderBy('rank', 'desc')
		->get();
		?>
		@foreach ($winners as $winner)
		
			<?php $userThatWon = User::find($winner->user_id);
			$pitchThatWon = Pitch::find($winner->pitch_id);
			$video_url = $pitchThatWon->video_url;
				//Log::info('Video url is: ' . $video_url);
			$completeVideoString = $pitchThatWon->embedVideoString();

			?>
			<div class="pitchContainer">
			<div class="pheader">
				<h3>{{{ $userThatWon->fname }}} {{{ $userThatWon->lname }}} pitching {{{ $pitchThatWon->company_name }}}</h3>
			</div>
			<div class="pbody">
			<div class="row">
				<div class="col-md-7">
					<div><iframe src="{{{ $completeVideoString }}}" width="600" height="400" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe><br/></div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<!-- create table that is going to be shown/hidden here -->
					<div id="pitch{{ $pitchThatWon->id }}">
						<p><strong>Ranking: </strong>{{{ $pitchThatWon->rank }}}</p>
					</div>
				</div>
				<div class="col-md-4">
					<!-- create table that is going to be shown/hidden here -->
					<div id="pitch{{ $pitchThatWon->id }}">
						<p><strong>Email: </strong>{{{ $userThatWon->email }}}</p>
					</div>
				</div>
				<div class="col-md-4">
					<!-- create table that is going to be shown/hidden here -->
					<div id="pitch{{ $pitchThatWon->id }}">
						<p><strong>Asking: </strong>{{{ $pitchThatWon->investment_size}}}</p>
					</div>
				</div>
			</div>
			</div>
			</div>

		@endforeach
		<!-- each pith in round end -->
	@endforeach
	<!-- each round end -->


	@else
		<p>There are no winners yet!</p>
	@endif
	</div>
	<?php
		$percentage = 100 * Settings::all()->last()->topPitchesPercentage;
		$completeTitle = 'Check the top ' . $percentage . '% of week ' . $winnerRound->round;
		?>
		<br />
		<div class="morePitches">
		<a href="/topPitches/{{$winnerRound->round}}" class="">Top 50 Pitches</a>
		<a href="/topPitches/{{$winnerRound->round}}" class=""><span></span></a>
		</div>
		
</div>

<!-- handle show/hide of extra content -->

<!-- <script>
	$("#pitchInfoButton").click(function (e) {
		e.preventDefault();
		var pitchId = $(this).attr('rel');

		$("#pitch"+pitchId).fadeToggle("fast", function () {

		});
	});
</script>
-->
@stop