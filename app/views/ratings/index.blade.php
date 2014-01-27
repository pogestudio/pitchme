@extends('layouts.scaffold')

@section('main')

<h1>All Ratings</h1>

<p>{{ link_to_route('ratings.create', 'Add new rating') }}</p>

@if ($ratings->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>User_id</th>
				<th>Rating</th>
				<th>Pitch_id</th>
				<th>Feedback</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($ratings as $rating)
                <tr>
                    <td>{{{ $rating->user_id }}}</td>
					<td>{{{ $rating->rating }}}</td>
					<td>{{{ $rating->pitch_id }}}</td>
					<td>{{{ $rating->feedback }}}</td>
                    <td>{{ link_to_route('ratings.edit', 'Edit', array($rating->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('ratings.destroy', $rating->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    There are no ratings
@endif

@stop