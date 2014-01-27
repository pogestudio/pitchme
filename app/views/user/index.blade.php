@extends('layouts.scaffold')

@section('main')

<h1>All users</h1>

@if (!empty($users))
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
				<th>Email</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Telephone</th>
				<th>Role</th>
                <th>Password</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->email }}</td>
					<td>{{ $user->fname }}</td>
					<td>{{ $user->lname }}</td>
					<td>{{ $user->tel }}</td>
					<td>{{ $user->role }}</td>
					<td>{{ $user->password }}</td>
                    <td>{{ link_to_route('user.edit', 'Edit', array($user->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('user.destroy', $user->id))) }}
                        {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    There are no users
@endif

@stop