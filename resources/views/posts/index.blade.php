@extends('layouts.app')

@section('content')
    @foreach ($posts as $post)
        <div class="card" style="margin-top:2rem;" >
        <img src="/storage/images/{{$post->img}}" alt="{{$post->title}}" style="width:400px;height:400px;object-fit:cover;">
            <div class="card-body">
            <h3><a href="/post/{{$post->id}}" class="card-title">{{$post->title}}</a></h3>
            <p class="card-text">{!!$post->body!!}</p>
             <p class="card-text">Created at {{$post->created_at}} by {{$post->author}}</p>
            </div>
        </div>
        
    @endforeach


@endsection
