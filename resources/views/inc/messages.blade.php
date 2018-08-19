@if(session('success'))
  <div class="alert alert-success">
    <button type="button" class="close" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    {{session('success')}}
  </div>
@endif
@if(session('fail'))
  <div class="alert alert-success">
    <button type="button" class="close" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    {{session('fail')}}
  </div>
@endif