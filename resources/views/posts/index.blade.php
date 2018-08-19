@extends('layouts.app')

@section('content')
@include('inc.messages')
  <div class="row">
    @foreach($posts as $post)
      <div class="col-md-4">
        <div class="card-deck">
          <div class=" card card-cascade wider mb-4" style="width: 18rem;">
            
            <!-- Card image -->
            {{-- Card Narrower  --}}
            <div class="view view-cascade overlay">
              <img class="card-img-top" src="/storage/images/{{$post->image}}" alt="Card image cap">
              <a>
                <div class="mask rgba-white-slight"></div>
              </a>
            </div>
          
            <!-- Card content -->
            <div class="card-body card-body-cascade">
              <!-- Label -->
              <h5 class="pink-text pb-2 pt-1"><i class="fa fa-cutlery"></i> Culinary</h5>
              <!-- Title -->
              <h4 class="card-title">{{$post->title}}</h4>
              <!-- Text -->
              <p class="card-text">by {{ $post->user->name }}</p>
              <!-- Button -->
              <a class="btn btn-unique" href="/posts/{{$post->id}}">Read More</a>
            </div>
          
          </div>
            {{-- Card Narrower  --}}
        </div>  
      </div>
    @endforeach()
  </div>
@endsection()