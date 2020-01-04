@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                @endif
                </div>
                @if(!Auth::check())
                    <p class="alert">Please log in to create post</p>
                @else 
                    <p class="alert">You logged in</p>
                @endif
                
            </div>
        </div>
    </div>
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
</div>
@endsection
