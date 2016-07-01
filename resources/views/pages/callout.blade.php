@extends('layouts.master')
@section('content')

    <div class="container content">
        <div class="row">
            <div class="large-8 medium-centered columns">
                <div class="large-12 columns title-field">
                    <div class="profile">
                        <?php $image = env('API_URL').'api/v1.0/uploads/'. $callout->photo; ?>
                        <div class="thumb-img" style = 'background-image: url({{$image}})'></div>
                    </div>
                    <div class="title">
                        {{ $callout->title }}
                    </div>
                </div>
                <div class="large-12 columns flex-video video-holder">
                    <!-- <iframe width="763" height="430" src="https://www.youtube.com/embed/hks_TtC5uC8" frameborder="0" allowfullscreen></iframe>
                     -->
                     <?php echo $video = env('API_URL').'api/v1.0/uploads/'. $callout->video; ?>

                    <video id="my-video" class="video-js" controls preload="auto" width="763" height="430"
                  poster="MY_VIDEO_POSTER.jpg" data-setup="{}">
                    <source src="<?php echo $video ?>" type='video/mp4'>
                    <p class="vjs-no-js">
                      To view this video please enable JavaScript, and consider upgrading to a web browser that
                      <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                    </p>
                  </video>
                </div>
                <div class="large-12 columns event-meta">
                    <ul>
                        <li class="small-4 columns fa fa-calendar">
                            <span class="section-title">Event Date:</span>
                            <span class="meta-data">{{ date('M j, Y',strtotime($callout->details_date)) }}</span>
                        </li>
                        <li class="small-3 columns fa fa-clock-o">
                            <span class="section-title">Time:</span>
                            <span class="meta-data">{{ date('g:i a',strtotime($callout->details_time)) }}</span>
                        </li>
                        <li class="small-5 columns fa fa-map-marker">
                            <span class="section-title">Venue:</span>
                            <span class="meta-data">{{ $callout->details_venue }}</span>
                        </li>
                    </ul>
                </div>
                <div class="small-9 columns event-summary">
                    <div class="section-title">
                        Details
                    </div>
                    <div class="section-content">
                        {{ $callout->description }}
                    </div>
                    <div class="button-container">
                        <a href="#">Show More <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="small-3 columns event-counter">
                    <div class="section-title">
                        Views
                    </div>
                    <div class="section-content">
                        <span class="views-counter">{{ number_format($callout->total_views) }}</span>
                        <div class="reaction-counter">
                            <ul>
                                <li class="fa fa-thumbs-o-up"><span>{{ number_format($callout->up) }}</span></li>
                                <li class="fa fa-thumbs-o-down"><span>{{ number_format($callout->down) }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="small-6 columns announcements">
                    <div class="section-title">
                        <i class="fa fa-bullhorn" aria-hidden="true"></i> Announcements
                    </div>
                    <div class="section-content">
                        {{ $callout->broadcast_url }}
                    </div>
                </div>
                <div class="small-6 columns tickets">
                    <div class="section-title">
                        <i class="fa fa-ticket" aria-hidden="true"></i> Tickets
                    </div>
                    <div class="section-content">
                        {{ $callout->ticket_url }}
                    </div>
                </div>
                <div class="large-12 columns event-buttons" data-callout="{{$callout->id}}">
                    <ul>
                        <li><a href="" class="fa fa-thumbs-o-up" data-action="vote-up"><span>Good Fight</span></a></li>
                        <li><a href="" class="fa fa-thumbs-o-down" data-action="vote-down"><span>Bad Fight</span></a></li>
                        <li><a href="" class="fa fa-commenting" data-action="comment"><span>Comments</span></a></li>
                        <li><a href="" class="fa fa-share-alt" data-action="share"><span>Share</span></a></li>
                    </ul>
                </div>
                <div class="large-12 columns login-form">
                    <form id="loginForm" action="/login">
                        <div class="section-title">
                            Please log in before you can vote or comment.
                        </div>
                        <div class="small-6 columns no-padding-left">
                            <div class="form-group">
                                <label class="sr-only" for="email">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="small-6 columns no-padding-right">
                            <div class="form-group">
                                <label class="sr-only" for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="small-12 columns no-padding-left no-padding-right">
                            <button type="button" name="button" class="button" id="loginFormBtn"> Submit ></button>
                        </div>
                    </form>
                </div>

                <div class="large-12 columns comments-container">
                    <div class="section-title">
                        Comments
                    </div>
                    <div class="large-12 columns comments-here"></div>
                    <div class="large-12 columns">
                        <textarea name="commentTextArea" id="commentTextArea" rows="3" cols="40" placeholder="Comment"></textarea>
                        <button type="button" name="button" class="button" id="commentFormBtn"> Submit ></button>
                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection
