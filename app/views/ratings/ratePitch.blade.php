@extends('layouts.scaffold')

@section('main')

<table class="feedbackTable">
            <?php $pitch = Pitch::find($pitch_id);
        $panelUserId = Auth::user()->id;
        $video_url = $pitch->video_url;
        $completeVideoString = "http://youtube.com/embed/" . $video_url . "?autoplay=1";

        Log::info('pitch id: ' . $pitch_id);
        Log::info('video url: ' . $completeVideoString);
        ?>

        <div class="row text-center">
        <h1>{{{ $pitch->company_name }}}</h1>
        </div>
        <div class="row text-center">
            <iframe src="{{{ $completeVideoString }}}" width="800" height="450" frameborder="0"></iframe>
        </div>
        <div class="row text-center">
            {{ Form::open(array('route' => 'ratings.store','id' => 'rateForm')) }}
            <input type="hidden" name="pitch_id" value="{{{ $pitch_id }}}" id="pitch_id" />
            <input type="hidden" name="user_id" value="{{{ $panelUserId }}}" id="user_id" />
            <input type="hidden" name="round" value="{{{ Settings::all()->last()->roundThatIsBeingRated }}}" id="round" />
            <input type="hidden" name="rating" value="" id="rating" />
            <textarea rows="4" cols="50" name="feedback" class="input-big" placeholder="Enter feedback..."></textarea>
            <div class="btn-group" >
              <button type="button" id="btn1" class="btn btn-danger btn-big">Mediocre</button>
              <button type="button" id="btn2" class="btn btn-primary btn-big">Good</button>
              <button type="button" id="btn3" class="btn btn-success btn-big">Genius</button>
            </div>
            {{ Form::close() }}
        </div>
            

</table>

<script>
$("#btn1").click(function(event) {
  event.preventDefault();
    rate(0);
});
$("#btn2").click(function(event) {
  event.preventDefault();
    rate(5);
});
$("#btn3").click(function(event) {
    event.preventDefault();
    rate(10);
});
</script>
<script>

function rate(rating) {

    document.getElementById('btn1').disabled = true;
    document.getElementById('btn2').disabled = true;
    document.getElementById('btn3').disabled = true;

  document.getElementById('rating').value = rating;
  document.getElementById('rateForm').submit();

}
</script>

@stop