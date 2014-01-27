@extends('layouts.scaffold')

@section('main')

<h1>Show Winner</h1>

<p>{{ link_to_route('winners.index', 'Return to all winners') }}</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Round</th>
				<th>Rank</th>
				<th>Pitch_id</th>
				<th>User_id</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{{ $winner->round }}}</td>
					<td>{{{ $winner->rank }}}</td>
					<td>{{{ $winner->pitch_id }}}</td>
					<td>{{{ $winner->user_id }}}</td>
                    <td>{{ link_to_route('winners.edit', 'Edit', array($winner->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('winners.destroy', $winner->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
        </tr>
    </tbody>
</table>

@stop