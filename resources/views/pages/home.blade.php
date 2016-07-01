@extends('layouts.landing')
@section('content')

    <div class="container content">
        <div class="row app-content">
            <div class="small-4 columns download-option">
                <p>Install FIGHTCALLOUT for IOS!</p>
                <a href="https://appsto.re/au/OUI2bb.i"><img src="img/appstore.png" alt="" /></a>
            </div>
            <div class="small-4 columns">
                <div class="logo-container">
                    <img src="img/logo_home.png" alt="" />
                </div>
                <div class="callout-container">
                    <img src="img/fco.png" alt="" />
                </div>
                <div class="link-container">
                    <ul>
                        <li><a href="#">Go to Admin</a></li>
                        <li><a href="/callout">Go to Main Page</a></li>
                    </ul>
                </div>
            </div>

            <div class="small-4 columns download-option">
                <!-- <p>Install FIGHTCALLOUT for Android!</p>
                <a href="#"><img src="img/googleplay.png" alt="" /></a> -->
                <div class="socialize-container">
                    <p>Socialize with us!</p>
                    <ul>
                        <li>
                            <a href="#">
                                <img src="img/fco_fb.png" alt="" />
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="img/fco_twitter.png" alt="" />
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="img/fco_mail.png" alt="" />
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="img/fco_google.png" alt="" />
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="small-12 columns">

            </div>
            <div class="small-12 columns footer">
                <p>All Rights Reserved 2016</p>
                <p>EpicentreTV, Sydney, Australia</p>
            </div>
        </div>
    </div>

@endsection
