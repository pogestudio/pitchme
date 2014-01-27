@extends('layouts.scaffold')

@section('main')

<h1>Show Pitch</h1>

<p>{{ link_to_route('pitches.index', 'Return to all pitches') }}</p>

<table class="table table-striped table-bordered">
    <thead>
            <tr>
                <th>Company name</th>
                <th>Video Url</th>
                <th>Investment Size</th>
            </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{ $pitch->company_name }}</td>
            <td>{{{ $pitch->video_url }}}</td>
            <td>{{{ $pitch->investment_size }}}</td>
            <td>{{ link_to_route('pitches.edit', 'Edit', array($pitch->id), array('class' => 'btn btn-info')) }}</td>
            <td>
                {{ Form::open(array('method' => 'DELETE', 'route' => array('pitches.destroy', $pitch->id))) }}
                {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </td>
        </tr>
        <tr>
            <td>BUY:
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="HHN6CP7V5CEBG">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
//<!-- <input type="hidden" name="custom" value="{{json_encode(array('user_id' => Auth::user()->id))}}"> -->
<input type="hidden" name="custom" value="{{json_encode(array('pitch_id' => $pitch->id))}}">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>

            </td>
        </tr>
    </tbody>
</table>

@stop