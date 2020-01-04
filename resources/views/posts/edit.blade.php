 @extends('layouts.app')


 @section('content')
<form action="/post/{{$post->id}}" method="POST" style="margin-top:5rem;">
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
      <textarea  id="article-ckeditor"   class="form-control"name="body" id="body" cols="30" rows="10">{{$post->body}}</textarea>
    </div>
    <input type="submit" class="btn btn-primary" value="Submit">
   
</form>


 @endsection
