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
    <link href="http://vjs.zencdn.net/5.10.4/video-js.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/css/fileinput.min.css" />
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/css/jssocials.css" />
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/css/jssocials-theme-flat.css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="{{url('/')}}/css/app.css">
    <!-- If you'd like to support IE8 -->
    <script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
  </head>
  <body>
    <div class="body-content">
        <div class="nav-container">
            <div class="row">
                <div class="large-8 medium-centered columns">
                    <div class="logo">
                        <a href="/"><img src="/img/new_logo.png" alt=""></a>
                    </div>
                    <ul>
                        <li class="hide-for-small-only"><a href="/">Callouts</a></li>
                        <li><a href="/about">About Us</a></li>
                        <li><a href="/contact">Contact</a></li>
                        <?php if(!isset($_COOKIE["token"])): ?>
                            <li><a href="/login">Login</a></li>
                        <?php else : ?>
                            <li class="profile-sub">
                                <a href="#">
                                    <img src="http://api.fightcallout.com/api/v1.0/uploads/{{$_COOKIE['user_photo']}}" alt="">{{$_COOKIE['user_name']}}
                                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                                </a>
                                <ul class="submenu">
                                    <li><a href="/profile">Profile</a></li>
                                    <li><a href="/forgot-password">Change Password</a></li>
                                    <li><a href="/logout">Logout</a></li>
                                </ul>

                            </li>
                        <?php endif; ?>

                    </ul>
                </div>
            </div>
        </div>
        @yield('content')
    </div>
    <div class="site-footer">
        <div class="large-8 medium-centered columns">
            <div class="small-12 columns footer">
                <p>All Rights Reserved 2016</p>
                <p>EpicentreTV, Sydney, Australia</p>
            </div>
        </div>
    </div>
    <script src="{{url('/')}}/js/vendor/jquery.js"></script>
    <script src="{{url('/')}}/js/vendor/what-input.js"></script>
    <script src="{{url('/')}}/js/vendor/foundation.js"></script>
    <script src="{{url('/')}}/js/velocity.min.js"></script>
    <script src="{{url('/')}}/js/js.cookie.js"></script>
    <script src="{{url('/')}}/js/app.js"></script>
    <script src="http://vjs.zencdn.net/5.10.4/video.js"></script>
    <script src="{{url('/')}}/js/jssocials.js"></script>
    <script src="{{url('/')}}/js/fileinput.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYj-l7uc5HlebMqbeK5dbw43DeFBe45Xk&libraries=places"></script>
      <script>
      $( function() {
        $( "#datepicker" ).datepicker({
          dateFormat: "yy-mm-dd"
        });
      });
      </script>

    <script>
        $("#share").jsSocials({
            showCount: false,
            showLabel: true,
            shareIn: "popup",
            shares: ["facebook", "twitter", "googleplus", "linkedin", "email"]
        });
    </script>

    <script>
        $("#avatar-1").fileinput({
            overwriteInitial: true,
            maxFileSize: 1500,
            showClose: false,
            showUpload: false,
            showCaption: false,
            browseLabel: 'Choose Image',
            removeLabel: '',
            browseIcon: '<i class="fa fa-camera" aria-hidden="true"></i>',
            removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
            removeTitle: 'Cancel or reset changes',
            elErrorContainer: '#kv-avatar-errors-1',
            msgErrorClass: 'alert alert-block alert-danger',
            defaultPreviewContent: '<img src="'+ $('#img-placeholder').data('img') +'" alt="Your Avatar" style="width:125px">',
            allowedFileExtensions: ["jpg", "png"]
        });
    </script>
    <script>

        $('#uploadImage').fileinput({
            showCaption: false,
            showPreview: false,
            showCancel: false,
            showUpload: false, // hide upload button
            showRemove: false, // hide remove button
            browseLabel: 'Take or Upload Image',
            //uploadUrl: "http://api.fightcallout.com/api/v1.0/callouts/upload", // server upload action
            uploadUrl: "http://fco-app.local/upload-callout",
            uploadAsync: true,
            maxFileCount: 1,
            browseIcon: '<i class="fa fa-picture-o" aria-hidden="true"></i>',
        }).on('change', function(event, numFiles, label) {
            $('#uploadImage').fileinput("upload");
        }).on('fileuploaded', function(event, data, previewId, index) {
            $('#uploadPhoto').val(data.response.upload.id);
        });

        $('#uploadVideo').fileinput({
            showCaption: false,
            showPreview: false,
            showCancel: false,
            showUpload: false, // hide upload button
            showRemove: false, // hide remove button
            browseLabel: 'Record or Upload Callout',
            uploadUrl: "http://api.fightcallout.com/api/v1.0/callouts/upload", // server upload action
            uploadAsync: true,
            maxFileCount: 1,
            browseIcon: '<i class="fa fa-play" aria-hidden="true"></i>',
        }).on('change', function(event, numFiles, label) {
            $('#uploadVideo').fileinput("upload");
        }).on('fileuploaded', function(event, data, previewId, index) {
            $('#uploadVid').val(data.response.upload.id);
        });

    </script>


    <script type="text/javascript">
    var endFunc = function() {
        vid.posterImage.show(); //shows your poster image//
        vid.currentTime(0);
        vid.controlBar.hide(); //hides your controls//
        vid.bigPlayButton.show(); //shows your play button//
      $(".vjs-big-play-button").addClass("replay-button");
    };

    var playFunc = function(){
        vid.posterImage.hide(); //hides your poster//
        vid.controlBar.show(); //shows your controls//
        vid.bigPlayButton.hide(); //hides your play button//
    }

    var vid = videojs("video", {}, function() {
      this.on('ended',endFunc);
      this.on('play',playFunc);
    });
    </script>


    <script type="text/javascript">

    videojs('video').ready(function(){
     console.log(this.options()); //log all of the default videojs options

      // Store the video object
     var myPlayer = this, id = myPlayer.id();
     // Make up an aspect ratio
     var aspectRatio = 430/763;

     function resizeVideoJS(){
       var width = document.getElementById(id).parentElement.offsetWidth;
       myPlayer.width(width).height( width * aspectRatio );

     }

     // Initialize resizeVideoJS()
     resizeVideoJS();
     // Then on resize call resizeVideoJS()
     window.onresize = resizeVideoJS;
    });

    </script>

    <script>
        function initialize() {

        var input = document.getElementById('details_venue');
        var autocomplete = new google.maps.places.Autocomplete(input);
        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>

  </body>
</html>
