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
    <link href="{{url('/')}}/bower_components/video.js/dist/video-js.min.css" rel="stylesheet">
    <link href="{{url('/')}}/bower_components/videojs-record/src/css/videojs.record.css" rel="stylesheet">
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
                                    <img src="{{$_COOKIE['user_photo']}}" alt="">{{$_COOKIE['user_name']}}
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
    <script src="{{url('/')}}/js/vendor/jquery.ui.widget.js"></script>
    <script src="{{url('/')}}/js/jquery.fileupload.js"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="{{url('/')}}/bower_components/video.js/dist/video.min.js"></script>
    <script type="text/javascript" src="{{url('/')}}/bower_components/recordrtc/RecordRTC.js"></script>
    <script type="text/javascript" src="{{url('/')}}/bower_components/videojs-record/src/js/videojs.record.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYj-l7uc5HlebMqbeK5dbw43DeFBe45Xk&libraries=places"></script>
      <script>
      $( function() {
        $( "#datepicker" ).datepicker({
          dateFormat: "yy-mm-dd",
          minDate: "dateToday"
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
            browseLabel: 'Upload Image',
            //uploadUrl: "http://api.fightcallout.com/api/v1.0/callouts/upload", // server upload action
            uploadUrl: "/upload-callout",
            allowedFileExtensions: ['jpg','jpeg','png', 'PNG'],
            uploadAsync: true,
            maxFileCount: 1,
            previewClass: "bg-warning",
            elErrorContainer: "#errorBlockImage",
        //    browseIcon: '<i class="fa fa-picture-o" aria-hidden="true"></i>',
        }).on('change', function(event, numFiles, label) {
            $('#uploadImage').fileinput("upload");
        })

        $('#uploadVideo').fileinput({
            showCaption: false,
            showPreview: false,
            showCancel: false,
            showUpload: false, // hide upload button
            showRemove: false, // hide remove button
            browseLabel: 'Upload Callout',
            uploadUrl: "/upload-callout", // server upload action
            allowedFileExtensions: ['mp4','avi','mpeg', 'flv', 'webm'],
            uploadAsync: true,
            maxFileCount: 1,
            previewClass: "bg-warning",
            elErrorContainer: "#errorBlockVideo"
        //    browseIcon: '<i class="fa fa-play" aria-hidden="true"></i>',
        }).on('change', function(event, numFiles, label) {
            $('#uploadVideo').fileinput("upload");
        })

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

    <script>
        $('#uploadVideo').fileupload({
            url: '/upload-callout',
            beforeSend: function() {
                $(".progressBarVideo").css({'display':'block'});
            },
            done: function (e, data) {
                   $.each(data.files, function (index, file) {
                       var message = 'Upload complete: ' + file.name + ' (' +
                           file.size + ' bytes)';
                       // $('<p/>').text(message).appendTo(document.body);
                       console.log(message);
                   });
                   var result = $.parseJSON(data.result);
                   var id = result.upload.id;
                   // add value to uploadVid id
                   $('#uploadVid').val(id);
                   console.log('Added value to #uploadVid.');
                   $(".progressBarVideo").css({'display':'none'});
                   $(".kv-upload-progress").addClass('hide');
                   // $(".successModalVideo").css({'display':'block'});

                   // hide success message after 3s
                   /*setTimeout(function(){
                        $(".successModalVideo").css({'display': 'none'});
                    }, 3000);*/
               },
            xhr: function() {
              var xhr = new window.XMLHttpRequest();

              xhr.upload.addEventListener("progress", function(evt) {
                if (evt.lengthComputable) {
                  var percentComplete = evt.loaded / evt.total;
                  percentComplete = parseInt(percentComplete * 100);
                  $('.progressBarVideo').text(percentComplete + '%');
                  $('.progressBarVideo').css('width', percentComplete + '%');

                }
              }, false);

              return xhr;
            }
        });

        $('#uploadImage').fileupload({
            url: '/upload-callout',
            done: function (e, data) {
                   $.each(data.files, function (index, file) {
                       var message = 'Upload complete: ' + file.name + ' (' +
                           file.size + ' bytes)';
                       // $('<p/>').text(message).appendTo(document.body);
                       console.log(message);
                   });console.log(data.result);
                   var result = $.parseJSON(data.result);
                   var id = result.upload.id;
                   // add value to uploadPhoto id
                   $('#uploadPhoto').val(id);
                   console.log('Added value to #uploadPhoto.');
                   $(".progressBarImage").css({'display':'none'});
                   $(".kv-upload-progress").addClass('hide');
                   // $(".successModalImage").css({'display':'block'});

                   // hide success message after 3s
                   /*setTimeout(function(){
                        $(".successModalImage").css({'display': 'none'});
                    }, 3000);*/
               },
        });


        $("button[data-open=takeImageModal]").click(function(){
            var imagePlayer = videojs('imagePlayer',
            {
                // video.js options
                controls: true,
                loop: false,
                width: 530,
                height: 400,
                autoplay: true,
                plugins: {
                    // videojs-record plugin options
                    record: {
                        image: true,
                        audio: false,
                        video: false,
                        maxLength: 100,
                        debug: true
                    }
                }
            });

            imagePlayer.on('finishRecord', function(){
                $('#uploadTakenImage').css('display','block');
                // the blob object contains the audio data
                var imageFile = imagePlayer.recordedData;
                var filesList = [imageFile];
                // upload data to server
                $('#uploadTakenImage').click(function(){
                    var data = new FormData();
                    data.append('photo', imageFile);

                    $.ajax({
                      url :  "/upload-callout",
                      type: 'POST',
                      data: data,
                      contentType: false,
                      processData: false,
                      beforeSend: function() {
                          $(".progressBarImage").css({'display':'block'});
                      },
                      success: function(data) {
                        console.log('Image Upload Success.');
                        var result = $.parseJSON(data);
                        var id = result.upload.id;
                        // add value to uploadPhoto id
                        $('#uploadPhoto').val(id);
                        console.log('Added value to #uploadPhoto.');
                        $(".progressBarImage").css({'display':'none'});
                        // $(".successModalImage").css({'display':'block'});

                        // hide success message after 3s
                        /*setTimeout(function(){
                            $(".successModalImage").css({'display': 'none'});
                        }, 3000);*/
                      },    
                      error: function() {
                        console.log('Image Upload Failed.');
                      },
                      xhr: function() {
                        var xhr = new window.XMLHttpRequest();

                        xhr.upload.addEventListener("progress", function(evt) {
                          if (evt.lengthComputable) {
                            var percentComplete = evt.loaded / evt.total;
                            percentComplete = parseInt(percentComplete * 100);
                            $('.progressBarImage').text(percentComplete + '%');
                            $('.progressBarImage').css('width', percentComplete + '%');

                          }
                        }, false);

                        return xhr;
                      }
                    });
                })
            });

            /**
             *
             * 1. If image record is closed, the camera device will be stopped.
             * 2. If image record is called again, we reset the state (start again)
             * 
             */
            $('#close-image').click(function(){
                imagePlayer.recorder.stopDevice();
            });

            $('#take-image').click(function(){
                imagePlayer.recorder.reset();
            });

            // If the user clicks outside the image recorder (close event)
            $(document).mouseup(function (e)
            {
                var container = $("#takeImageModal");

                if (!container.is(e.target) // if the target of the click isn't the container...
                    && container.has(e.target).length === 0) // ... nor a descendant of the container
                {
                    imagePlayer.recorder.stopDevice();
                }
            });

        });

        $("button[data-open=takeVideoModal]").click(function(){
            var player = videojs('videoPlayer',
            {
                // video.js options
                controls: true,
                loop: false,
                width: 530,
                height: 400,
                preload: 'auto',
                plugins: {
                    // videojs-record plugin options
                    record: {
                        image: false,
                        audio: true,
                        video: true,
                        maxLength: 100,
                        debug: true
                    }
                }
            });

            player.on('finishRecord', function()
            {
                $('#uploadTakenVideo').css('display','block');
                // the blob object contains the audio data
                var videoFile = player.recordedData;
                var filesList = [videoFile];

                console.log(filesList);
                $('#uploadTakenVideo').click(function(){
                    // The return of the player.recordedData is different for other browsers
                    if (navigator.userAgent.indexOf("Chrome") >= 0) {
                        $('#uploadVideo').fileupload('add', {files: filesList[0].video});
                        console.log('Video Upload Success (Chrome)');
                    }
                    else if (navigator.userAgent.indexOf("Firefox") >= 0) {
                        $('#uploadVideo').fileupload('add', {files: filesList});
                        console.log('Video Upload Success (Firefox)');
                    }
                })

            });

            /**
             *
             * 1. If video record is closed, the camera device will be stopped.
             * 2. If video record is called again, we reset the state (start again)
             * 
             */
            $('#close-video').click(function(){
                player.recorder.stopDevice();
            });

            $('#take-video').click(function(){
                player.recorder.reset();
            });
            
            // If the user clicks outside the video recorder (close event)
            $(document).mouseup(function (e)
            {
                var container = $("#takeVideoModal");

                if (!container.is(e.target) // if the target of the click isn't the container...
                    && container.has(e.target).length === 0) // ... nor a descendant of the container
                {
                    player.recorder.stopDevice();
                }
            });

        });
    </script>

  </body>
</html>
