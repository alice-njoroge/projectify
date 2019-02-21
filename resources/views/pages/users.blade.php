@extends('layouts.main')

@section('content')
    <h3 class="text-center">Users</h3>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Total Projects</th>
            <th scope="col" colspan="2" class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->projects_count}}</td>
            <td><a href="{{route('projects', ['user_id' => $user->id])}}" class="btn btn-outline-secondary">View Projects</a> </td>
            <td><a href="{{route('create_project', ['user_id' => $user->id])}}" class="btn btn-outline-primary">Add Project</a> </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @endsection
