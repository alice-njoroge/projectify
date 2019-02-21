@extends('layouts.main')

@section('content')
    <br/>
    <a href="{{route('users')}}" class="btn btn-outline-secondary">Back</a>
    <h3 class="text-center">Assign {{$user->name}} Project</h3>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form method="post" action="{{route('store_projects', ['user_id' => $user->id])}}">
                @csrf
                <div class="form-group">
                    <label for="project">Project Name</label>
                    <input type="text"
                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                           id="project"
                           name="name"
                           aria-describedby="Project"
                           value="{{old('name')}}"
                           placeholder="Enter Project Name">
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="description">Project Description</label>
                    <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                              id="description" rows="3"
                              name="description">{{old('description')}}</textarea>
                    @if ($errors->has('description'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-outline-primary">Assign Project</button>
            </form>
        </div>
    </div>
@endsection
