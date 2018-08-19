<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;


class PostsController extends Controller
{

  public function __construct(){
    $this->middleware('auth', ['except' => ['index','show']]);
  }

  public function index(){
    $posts = Post::latest()->get();
    // return $posts;
    return view('posts.index',compact('posts'));
  }

  public function show(Post $post){
    return view('posts.show',compact('post'));
  }

  public function create(){
    return view('posts.create');
  }

  public function store(Request $request){
    $this->validate(request(),[
      'title' => 'required|min:4',
      'body' => 'required|min:10',
      'image' => 'image|nullable|max:1993'
    ]);

    if($request->hasFile('image')){
      // get filename with extension
      $fileNameWithExt =  $request->file('image')->getClientOriginalName();
      // get filename 
      $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
      // get extension
      $extension = $request->file('image')->getClientOriginalExtension();
      // filename to store
      $fileNameToStore = $fileName.'_'.time().'.'.$extension;
      // upload image
      $path = $request->file('image')->storeAs('public/images', $fileNameToStore);

    }else{
      $fileNameToStore = 'noimage.jpg';
    }

    Post::create([
      'title' => request('title'),
      'body' => request('body'),
      'user_id' => auth()->user()->id,
      'image' => $fileNameToStore,
      ]);
    
    return redirect('/posts')->with('success', 'Post has been successfully created');
  }

  public function edit(Post $post){
    if(!auth()->user()->id == $post->user_id){
      return redirect('/');
    }
    
    return view('posts.edit',compact('post'));
  }

  public function update(Request $request, Post $post){
    if($request->hasFile('image')){
      // get filename with extension
      $fileNameWithExt =  $request->file('image')->getClientOriginalName();
      // get filename 
      $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
      // get extension
      $extension = $request->file('image')->getClientOriginalExtension();
      // filename to store
      $fileNameToStore = $fileName.'_'.time().'.'.$extension;
      // upload image
      $path = $request->file('image')->storeAs('public/images', $fileNameToStore);

    }

    if ($request->hasFile('image')) {
      Storage::delete('public/images/' . $post->image);
      $fileToUpdate = $fileNameToStore;
    }else{
      $fileToUpdate = $post->image;
    }
    // validate inputs
    $this->validate(request(),[
      'title' => 'required|min:4',
      'body' => 'required|min:10',
      'image' => 'image|max:1993|'
    ]);

    $post->update([
      'title' => request('title'),
      'body' => request('body'),
      'image' => $fileToUpdate,
      ]);

    return redirect("/posts/$post->id")->with('success', 'Post has been successfully updated');
  }

  public function destroy(Post $post){
    if(!auth()->user()->id == $post->user_id){
      return redirect('/');
    }
    if($post->image != 'noimage.jpg'){
      Storage::delete('public/images/'.$post->image);
    }

    $post->delete();
    return redirect('/posts')->with('fail','Post deleted');
  }
}
