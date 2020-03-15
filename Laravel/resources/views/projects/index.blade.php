@extends('layout')

@section('content')
    <h1>Project List</h1>
    <h1>Project List</h1>
    @foreach($projects as $project)
        Title : {{$project->id}}<br>
        Description : {{$project->description}}
    @endforeach
@endsection()