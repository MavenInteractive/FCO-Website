<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fight Callout</title>
    <link rel="icon" href="{{url('/')}}/favicon.png" type="image/x-icon" />
    <link rel="stylesheet" href="{{url('/')}}/css/foundation.css">
    <link rel="stylesheet" href="{{url('/')}}/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{url('/')}}/css/app.css">
    <link href="http://vjs.zencdn.net/5.10.4/video-js.css" rel="stylesheet">
    <!-- If you'd like to support IE8 -->
    <script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
  </head>
  <body>
    <div class="nav-container">
        <div class="row">
            <div class="large-8 medium-centered columns">
                <div class="logo">
                    <a href="/callout"><img src="/img/new_logo.png" alt=""></a>
                </div>
                <ul>
                    <li><a href="/callout">Callouts</a></li>
                    <li><a href="/about">About Us</a></li>
                    <li><a href="/contact">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </div>
    @yield('content')
    <script src="{{url('/')}}/js/vendor/jquery.js"></script>
    <script src="{{url('/')}}/js/vendor/what-input.js"></script>
    <script src="{{url('/')}}/js/vendor/foundation.js"></script>
    <script src="{{url('/')}}/js/velocity.min.js"></script>
    <script src="{{url('/')}}/js/js.cookie.js"></script>
    <script src="{{url('/')}}/js/app.js"></script>
    <script src="http://vjs.zencdn.net/5.10.4/video.js"></script>
  </body>
</html>
