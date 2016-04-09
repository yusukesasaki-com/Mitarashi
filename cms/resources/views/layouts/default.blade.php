<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="/cms/css/kathamo.css">
  <link rel="stylesheet" href="/cms/css/common.css">
  @yield('css')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  <script>
  $(function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
  });
  </script>
</head>
<body>
  @if (session('flash_message'))
    <div class="flash_message alert alert-success">
      <p>{{ session('flash_message') }}</p>
    </div>
  @endif
  @include('errors.errors')
  <div class="container">
    @yield('content')
  </div>

</body>
</html>
