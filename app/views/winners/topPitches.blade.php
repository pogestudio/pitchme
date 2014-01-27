@extends('layouts.scaffold')
@section('main')

@if (!empty($topPitches))
<div class="mainTable"> <!-- this is the main table of all content --> 
            <div class="row">
                <h3>Week: {{ $round }}</h3>
            </div>
            <!-- each pitch in round start -->
            @foreach ($topPitches as $aTopPitch)

            <?php $userThatWon = User::find($aTopPitch->user_id);
            $pitchThatWon = Pitch::find($aTopPitch->pitch_id);
            $video_url = $pitchThatWon->video_url;
                //Log::info('Video url is: ' . $video_url);
            $completeVideoString = $pitchThatWon->embedVideoString();

            ?>
            <div class="row">
                <div><h3>{{{ $userThatWon->fname }}} {{{ $userThatWon->lname }}} pitching {{{ $pitchThatWon->company_name }}}</h3></div>
            </div>
            <div class="row">
                <div><iframe src="{{{ $completeVideoString }}}" width="600" height="400" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>
            </div>
            <div class="row">
                    <!-- create table that is going to be shown/hidden here -->
                    <div id="pitch{{{ $pitchThatWon->id }}}">
                            <div class="row">
                                <div>Ranking: {{{ $pitchThatWon->rank }}}</div>
                            </div>
                            <div class="row">
                                <div>Email: {{{ $userThatWon->email }}}</div>
                            </div>
                            <div class="row">
                                <div>Asking: {{{ $pitchThatWon->investment_size}}}</div>
                            </div>
                    </div>
            </div>
            
            <br><br>

            @endforeach
            <!-- each pith end -->

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
@else
No pitches exist
@endif

@stop