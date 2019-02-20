@extends('layouts.main')

@section('content')
    <br/>
    <a href="{{route('users')}}" class="btn btn-outline-secondary">Back</a>
    <h3 class="text-center">{{$user->name}} Projects</h3>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Total Un Complete</th>
            <th scope="col">Total Complete Tasks</th>
            <th scope="col">Total Tasks</th>
            <th scope="col" colspan="2" class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($projects as $project)
            <tr>
                <td>{{$project->name}}</td>
                <td>{{$project->un_complete_tasks_count}}</td>
                <td>{{$project->completed_tasks_count}}</td>
                <td>{{$project->tasks_count}}</td>
                <td><a href="{{route('projects', ['user_id' => $user->id])}}" class="btn btn-outline-secondary">View Tasks</a> </td>
                <td><a href="#" class="btn btn-outline-primary">Add Task</a> </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
