@extends('layout')

@section('title')
    Welcome
@endsection

@section('content')
    Welcome
    <ul>
        <?php foreach($books as $book):?>
            <li><?php echo $book;?></li>
         <?php endforeach; ?>
    </ul>
@endsection

@section('content')
    Welcome
    <ul>
        @foreach($books as $book)
            <li>{{$book}}</li>
         @endforeach
    </ul>
@endsection