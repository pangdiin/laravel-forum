<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../favicon.ico">

  <title>@yield('title')</title>

  <!-- Bootstrap core CSS -->
  <link href="/src/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container">

  @include('layouts.partials.nav')

  @include('layouts.partials.validation')
  
  @yield('content')

</div>

<script src="/src/js/jquery.min.js"></script>
<script src="/src/js/bootstrap.min.js"></script>
  
</body>
</html>