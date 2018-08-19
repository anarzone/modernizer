@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Dashboard</div>

        <div class="card-body">
          @if (session('status'))
              <div class="alert alert-success" role="alert">
                  {{ session('status') }}
              </div>
          @endif
            <h3>Posts</h3>
            <table class="table table-striped">
              <tr>
                <th>Title</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
              @foreach($user->posts as $post)
                <tr>
                  <td>{{$post->title}}</td>
                  <td>
                    <button class="btn btn-flat btn-rounded btn-elegant btn-sm">
                      <a class="text-white" href="posts/{{$post->id}}/edit">Edit</a>
                    </button> 
                  </td>
                  <td>
                      <form action="/posts/{{$post->id}} " method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-flat btn-rounded btn-danger btn-sm">Delete</button>
                      </form>
                  </td>
                </tr>
              @endforeach        
            </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
