@extends('layouts.master')
@section('content')

    <div class="container content">
        <div class="row">
          <div class="large-8 medium-centered columns">
                <div class="small-12 map-container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3939.2740387568715!2d151.21505026273482!3d-33.876222722470246!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b12ae16ba504233%3A0xe547d79c07139971!2s2%2F98+Riley+St%2C+Darlinghurst+NSW+2010%2C+Australia!5e0!3m2!1sen!2sph!4v1467347840867" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>

                <div class="small-6 columns location">
                    <div class="section-title">
                        Our Location for Meeting
                    </div>
                    <div class="statement">
                        ADDRESS: Lvl 2, 98 Riley Street, Darlinghurst Sydney NSW 2010 <br />
                        MOBILE: +61 422 010 535  <br />
                        EMAIL: lukecampbell@epicentre.tv </br>
                        URL: www.epicentre.tv
                    </div>
                </div>
                <div class="small-6 columns socialize">
                    <div class="section-title">
                        Socialize with us
                    </div>
                    <ul>
                        <li><a href="https://www.facebook.com/FightCallOut/?fref=ts" class="fa fa-facebook-square"></a></li>
                        <li><a href="#" class="fa fa-twitter-square"></a></li>
                        <li><a href="#" class="fa fa-google-plus-square"></a></li>
                    </ul>
                </div>
                <div class="form-container small-12 columns">
                    <form action="" method="POST">
                        <div class="section-title">
                            Send us an email
                        </div>
                        <div class="small-6 columns">
                            <div class="form-group">
                                <label class="sr-only" for="email">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="subject">Password</label>
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
                            </div>
                        </div>
                        <div class="small-6 columns">
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="3" placeholder="Message"></textarea>
                            </div>
                        </div>
                        <div class="small-12 columns no-padding-left no-padding-right">
                            <button type="submit" class="button btn btn-default send-btn">Send</button>
                        </div>
                    </form>
                </div>
          </div>
        </div>
    </div>

@endsection
