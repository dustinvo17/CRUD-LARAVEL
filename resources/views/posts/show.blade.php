 @extends('layout.app')


 @section('content')
 <div class="card" style="margin-top:2rem;">
     <div class="card-body">
         <h3><a href="/post/{{$post->id}}" class="card-title">{{$post->title}}</a></h3>
         <p class="card-text">{{$post->body}}</p>
         <p class="card-text">Created at {{$post->created_at}} by {{$post->author}}</p>
         <div style="display:flex;justify-content:space-between;">
         <a href="/post/{{$post->id}}/edit" class="btn btn-primary">Edit</a>
         <form action="/post/{{$post->id}}" method="POST">
                 @csrf
                {{ method_field('DELETE') }}
                 <input  class="btn btn-danger pull-right" type="submit" name="DELETE" value="DELETE">
            </form>
         
         </div>

     </div>

 </div>

 @endsection
