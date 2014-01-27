@extends('layouts.scaffold')
@section('main')
<br><br>

@if (!empty($interactions))
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Round</th>
            <th>Investor name</th>
            <th>Did watch round</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($interactions as $interaction)
        <tr>
            <td>{{ $interaction['round'] }}</td>
            <td>{{ $interaction['name'] }}</td>
            
            <?php if ($interaction['didWatch']): ?>
            <td>Yes</td>
            <? else: ?>
            <td>No</td>
        	<? endif ?>
        </tr>
        @endforeach
    </tbody>
</table>
@else
There are no pitches
@endif


@stop
