@extends('layouts.master')
@section('content')

<div class="container content">
    <div class="row">
      <div class="large-8 medium-centered columns">
            <div class="logo-container"><img src="img/logo.png" alt="" /></div>
            <div class="about">
                <div class="section-title">
                    Login
                </div>
                <div class="row">
                    <div class="large-6 medium-centered columns">
                        @if(Session::has('error_login'))
                            <p style="color: #fff;">{!! Session::get('error_login') !!}</p>
                        @endif
                        <form action="/login" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group with-icon">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <input type="text" class="form-control" name="email" id="email" placeholder="Email/Username">
                            </div>
                            <div class="form-group with-icon">
                                <i class="fa fa-key" aria-hidden="true"></i>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                            </div>
                          <button type="submit" class="button btn-default send-btn">Login</button>
                        </form>
                        <p style="color:#fff; font-size: 12px;">Don't have an account? <a style="color: #9e0b0f" href="/register">Register</a></p>
                    </div>
                </div>
            </div>
      </div>
    </div>
</div>

@endsection
