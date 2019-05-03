<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  <!-- yay! -->
  <link rel="stylesheet" href="/css/app.css">
</head>
<body>
  <div class="container-fluid">
    <div class="header">
      <div class="header-inner">
        <a href="/">
          <img style="height:20px; margin-top: 3px;" src="/logo.svg"/>
        </a>
        <div style="flex-grow: 1;
    text-align: right;">
          @if (Auth::check())
            <a class="btn btn-light" href="/logout">Log Out</a>
          @else
            <!-- <a class="btn btn-light" href="/login">Login</a>
            <a class="btn btn-light" href="/signup">Sign Up</a> -->
          @endif
        </div>
    </div>
    </div>

  @yield('main')

  </div>

  <script src="/js/micromodal.min.js"></script>
  <script src="/js/app.js"></script>
</body>
</html>
