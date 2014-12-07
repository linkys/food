<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Justified Nav Template for Bootstrap</title>

    {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/main.css') }}

  </head>

  <body>

    <div class="container row">
        <div class="col-lg-offset-2 col-lg-10">

        @include('general.header')

        @yield('content')

        </div>
    </div>

  </body>
</html>
