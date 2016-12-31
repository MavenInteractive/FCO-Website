@extends('layouts.master')
@section('content')

<div class="container content">
    <div class="row">
      <div class="large-8 medium-centered columns">
            <div class="logo-container"><img src="img/logo.png" alt="" /></div>
            <div class="about">
                <div class="section-title">
                    Sign Up
                </div>
                <div class="row">
                    <div class="large-6 medium-centered columns">
                        @if(Session::has('error'))
                            <p style="color: #fff;">{!! Session::get('error') !!}</p>
                        @endif
                        <form action="/register" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group with-icon">
                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                            </div>
                            <div class="form-group with-icon">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                            </div>
                            <div class="form-group with-icon">
                                <i class="fa fa-key" aria-hidden="true"></i>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                            </div>
                            <div class="form-group with-icon">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                                <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
                            </div>
                          <button type="submit" class="button btn-default send-btn">Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
      </div>
    </div>
</div>

@endsection
