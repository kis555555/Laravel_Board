@extends('layouts.app')

@section('title')
    Create Task
@endsection

@section('content')
    <div class = "px-64">
        <h1 class = "font-bold text-3xl">Create Tasks</h1>
        <form action = "/tasks" method = "POST">
        @csrf
            <label class = "block" for = "title">Title</label>
            <input class = "border border-gray-800 w-full @error('title') border border-red-700 @enderror"type = "text" name = "title" id = "title"
            id = "title" value = "{{ old('title') ? old('title') : ''}} " required><br>
            @error('title')
                <small class ="text-red-700">{{ $message }}</small>
            @enderror

            <label for = "body" class = "block">Body</label>
            <textarea name = "body" class = "border border-gray-800 w-full @error('body') border border-red-700 @enderror" id = "body" cols = "30" rows = "10" required>{{ old('body') ? old('body') : ''}}</textarea>
            <br>
            @error('body')
                <small class ="text-red-700">{{ $message }}</small>
            @enderror
        <button class = "bg-blue-600 text-white px-4 py-2 float-right">Submit</button>
        </from>
        
      
    </div>
@endsection