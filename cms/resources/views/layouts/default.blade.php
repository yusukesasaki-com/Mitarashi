<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="/cms/css/kathamo.css">
  <link rel="stylesheet" href="/cms/css/common.css">
  @yield('css')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
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
