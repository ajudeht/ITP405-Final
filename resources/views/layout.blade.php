<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="shortcut icon" type="image/png" sizes="32x32" href="/favicon-32x32.png" sizes="32x32">
  <link rel="shortcut icon" type="image/png" sizes="16x16" href="/favicon-16x16.png" sizes="16x16">
  <link rel="manifest" href="/site.webmanifest">

  <meta name="apple-mobile-web-app-title" content="Janice" />
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="default" />


  <title>@yield('title')</title>
  <!-- yay! -->
  <link rel="stylesheet" href="/css/app.css">
</head>
<body>
  <div class="container-fluid">
    <div class="header">
      <div class="header-inner">
        <a href="/">
          <img style="height:17px; margin-top: 5px;" src="/logo.svg"/>
        </a>
    </div>
    </div>

  @yield('main')

  </div>
  <script src="/js/popper.min.js"></script>
  <script src="/js/tooltip.js"></script>
  <script src="/js/micromodal.min.js"></script>
  <script src="/js/app.js"></script>
</body>
</html>
