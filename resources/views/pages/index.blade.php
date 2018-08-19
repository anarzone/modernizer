@extends('layouts.app')

@section('content')
  @guest
    <div class="jumbotron">
      <h1 class="display-4">Welcome to our new Blog</h1>
      <p class="lead">We are going to make things easier for you</p>
      <hr class="my-4">
      <a class="btn btn-primary btn-lg" href="/login" role="button">Login</a>
      <a class="btn btn-success btn-lg" href="/register" role="button">Register</a>
    </div>
  @endguest  
  @auth
    <div class="jumbotron">
      <h1 class="display-4">Welcome {{Auth::user()->name}} </h1>
      <p class="lead">Soon there will be fancy homepage</p>
    </div>
  @endauth  
@endsection()