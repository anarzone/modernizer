@extends('layouts.app')

@section('css')
 
@endsection()

@section('content')
  <div class="col-md-12 blog-main">
    <h1>Create Post</h1>
    <hr>
    @include('inc.errors') 
    {{-- create post form --}}
    <form action="/posts" method="post" enctype="multipart/form-data">
      {{csrf_field()}}
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title">
      </div>
      <div class="form-group">
        <label for="body">Body</label>
        <textarea id="article-ckeditor" class="form-control" name="body"></textarea>
      </div>
      <div class="form-group">
        <label for="image">Upload Image</label>
        <input type="file" class="form-control" name="image" accept="image/*">
      </div>
      <button type="submit" class="btn btn-primary">Create</button>
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