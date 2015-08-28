<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>@yield('title')</title>

    {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/main.css') }}
    {{ HTML::style('css/jquery.nouislider.min.css') }}
    {{--{{ HTML::style('css/jquery.nouislider.pips.css') }}--}}

    {{ HTML::script('js/jquery-2.1.1.min.js') }}
    {{ HTML::script('js/jquery.nouislider.all.js') }}
    {{ HTML::script('js/main.js') }}

  </head>

  <body>

    <div class="container">
        <div class="row">
            <div class="col-lg-offset-1 col-lg-10">

            @include('general.header')

            @yield('content')

            </div>
        </div>
    </div>

  </body>
</html>
