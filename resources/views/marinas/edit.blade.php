@extends('layout')

@section('content')
    @include ('flash')
    <h1 class="title">Edit Project</h1>
    <form action="/projects/{{$project->id}}" method="POST" style="margin-bottom:1em">
    @method('PATCH')
    @csrf
    
        <div class="field">
            
            <label class="label" for="title">Title</label>
            
            <div class="control">
                <input type="text" class="input" name="title" placeholder="Title" value="{{ $project->title }}">
            </div>    

        </div>

        <div class="field">
            
            <label class="label" for="description">Description</label>
            
            <div class="control">
                <textarea class="textarea" name="description">{{ $project->description }}</textarea>
            </div>    

        </div>

        <div class="field">

            <div class="control">
                <button type="submit" class="button is-link">Update Project</button>
            </div>    

        </div>
    </form>

    @include ('errors')

    <form action="/projects/{{$project->id}}" method="POST">
    @method('DELETE')
    @csrf
    

        <div class="field">

            <div class="control">
                <button type="submit" class="button">Delete Project</button>
            </div>    

        </div>
    </form>

@endsection