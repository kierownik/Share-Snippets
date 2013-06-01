<!doctype html>
<html lang="en">
<head>
  <title>@yield( 'title' )</title>
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
  <meta charset="utf-8" />
  {{ HTML::style( '//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css', array( 'media' => 'screen' ) ) }}
  {{ HTML::style( 'packages/css/main.css', array( 'media' => 'screen' ) ) }}
</head>
<body>
  <div class="container">
    @yield( 'content' )
  </div>
  {{ HTML::script( '//ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js' ) }}
  <script>
    $( 'textarea#snippet' ).height( $(window).height() - 70 );
  </script>
</body>
</html>