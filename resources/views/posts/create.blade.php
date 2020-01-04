 @extends('layouts.app')


 @section('content')
<form action="/post" method="POST" style="margin-top:5rem;" enctype="multipart/form-data">
      @csrf
   
    <div class="form-group">
         <label for="title">Title</label>
         <input  class="form-control" type="text" name="title" value="">
      <div class="form-group">
         <label for="author">Author</label>
         <input  class="form-control" type="text" name="author" value="">
    </div>
      <div class="form-group">
         <label for="body">Body</label>
      <textarea id="article-ckeditor"  class="form-control"name="body" id="body" cols="30" rows="10"></textarea>
    </div>
       <input type="file" name="img" style="margin:2rem 0;" />
       <br >
    <input type="submit" class="btn btn-primary" value="Submit">
   
</form>


 @endsection
