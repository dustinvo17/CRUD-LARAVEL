<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Session;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
    $this->middleware('auth',['except' =>['show']]);
    }
    public function index()
    {
        //
        $posts = Post::where('user_id',Auth::id())->get()->reverse();
        return view('posts.index',['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
            if(Auth::check()) {
        return view('posts.create');
    }   
    else {
        Session::flash('message','You have to log in');
        //
        return redirect('/');
     
    }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         $validation = $this->validate($request,[
            'title' => 'required',
           'author' => 'required',
           'body' => 'required'
        ]);
        if($validation) {
           $post = new Post();
           $post->title = $request->title;
           $post->body = $request->body;
           $post->author = $request->author;
           $post->user_id = Auth::id();
            if($request->img) {
            $file = $request->file('img')->getClientOriginalName();

            $filename = pathinfo($file, PATHINFO_FILENAME);
            $extension = pathinfo($file, PATHINFO_EXTENSION);
            $fullPath = $filename. now()->timestamp. '.'.$extension;
            $request->file('img')->storeAs('images',$fullPath);
            $post->img = $fullPath;
            }
            else {
                $post->img = 'no-image.png';
            }
            
            $post->save();
          return redirect('/post');
           
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::find($id);
        return view('posts.show',['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

          $post = Post::find($id);
            if($post->user_id !== Auth::id()) {
            return redirect('/');
        }
        return view('posts.edit',['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
      
       $validation = $this->validate($request,[
            'title' => 'required',
           'author' => 'required',
           'body' => 'required'
        ]);
        if($validation) {
            
            $post->title = $request->title;
            $post->body = $request->body;
            $post->author = $request->author;
     
        }
        if($request->img){
                $file = $request->file('img')->getClientOriginalName();
                $filename = pathinfo($file, PATHINFO_FILENAME);
                $extension = pathinfo($file, PATHINFO_EXTENSION);
                $fullPath = $filename. now()->timestamp. '.'.$extension;
                $request->file('img')->storeAs('images',$fullPath);
                    if($post->img !== 'no-image.png'){
                        $currentImg = '/storage/images/{{$post->img}}';
                        Storage::disk('public')->delete("/images/".$post->img);
                    }
                 $post->img = $fullPath;
        }
             
        $post->save();
        return redirect('/post');
     
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::find($id);
         if($post->user_id !== Auth::id()) {
            return redirect('/');
        }
        if($post){
            if($post->img !== 'no-image.png'){
               Storage::disk('public')->delete("/images/".$post->img);
            }
            Post::destroy($id);
            return redirect('/post');
        }
       
        
        
    }
}
