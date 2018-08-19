@extends('layouts.app')

@section('content')
  @include('inc.messages')
  <h1>{{$post->title}}</h1>
  <small>Posted {{$post->created_at->diffForHumans()}} by {{$post->user->name}}</small>
  <br>
  <img src="/storage/images/{{$post->image}}" alt="image">
  <p>{!!$post->body!!}</p>
  @auth
    @if(Auth::user()->id == $post->user_id)
      <small><a href="/posts/{{$post->id}}/edit">Edit</a></small>
    @endif
  @endauth
  @endsection()