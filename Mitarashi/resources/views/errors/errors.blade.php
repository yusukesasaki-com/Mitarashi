@if ($errors->any())
  <div class="alert alert-danger">
    <div class="container">
      @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
      @endforeach
    </div>
  </div>
@endif
