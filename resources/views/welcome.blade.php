@extends('layouts.app')

@section('title', 'Hencam forum')

@section('sidebar')
    @parent
        @foreach ($comments as $comment)
            <p>{{ $comment->content }}</p>
        @endforeach
@endsection

@section('content')
    <p>Latest posts...</p>
    @foreach ($posts as $post)
        <div class="row">
            <div class="col-md-8">
                {{ $post->title }}
            </div>
            <div class="col-md-2">
                {{ $post->name }}
            </div>
            <div class="col-md-2">
                {{ $post->created_at }}
            </div>
    @endforeach
@endsection