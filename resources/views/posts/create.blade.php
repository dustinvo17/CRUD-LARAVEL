 @extends('layout.app')


 @section('content')
<form action="/post" method="POST" style="margin-top:5rem;">
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
      <textarea  class="form-control"name="body" id="body" cols="30" rows="10"></textarea>
    </div>
    <input type="submit" class="btn btn-primary" value="Submit">
   
</form>


 @endsection
