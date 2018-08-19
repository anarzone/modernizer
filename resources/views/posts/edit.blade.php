@extends('layouts.app')

@section('css')
 
@endsection()

@section('content')
  <div class="col-md-12 blog-main">
    <div>
      <h1 class="">Create Post</h1>
    </div>
    <hr>
    @include('inc.errors') 
    {{-- create post form --}}
    <form action="/posts/{{$post->id}}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      {{ method_field('PATCH') }}
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}">
      </div>
      <div class="form-group">
        <label for="body">Body</label>
          <div id="">
            <textarea id="article-ckeditor" class="form-control" name="body">{{$post->body}}</textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="image">Upload Image</label>
          <input type="file" class="form-control" name="image" accept="image/*">
        </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form> 
    {{-- /create post form end--}}
  </div>
@endsection()

@section('js')
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
  <script>
    CKEDITOR.replace( 'article-ckeditor' );
  </script> 
@endsection()  