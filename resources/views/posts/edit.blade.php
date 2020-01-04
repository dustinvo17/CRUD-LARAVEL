 @extends('layouts.app')


 @section('content')
<form action="/post/{{$post->id}}" method="POST" style="margin-top:5rem;" enctype="multipart/form-data">
      @csrf
      {{ method_field('PUT') }}
    <div class="form-group">
         <label for="title">Title</label>
         <input  class="form-control" type="text" name="title" value="{{$post->title}}">
    </div>
      <div class="form-group">
         <label for="author">Author</label>
         <input  class="form-control" type="text" name="author" value="{{$post->author}}">
    </div>
      <div class="form-group">
         <label for="body">Body</label>
      <textarea  id="editor"   class="form-control"name="body"  cols="30" rows="10">{{$post->body}}</textarea>
    </div>
   <p>Current: {{$post->img}}</p>
        <input type="file" name="img" style="margin:2rem 0;" />
       <br >
    <input type="submit" class="btn btn-primary" value="Submit">
   
</form>


 @endsection
