@extends('layouts.master')
@section('content')

<div class="container content">
    <div class="row">
      <div class="large-8 medium-centered columns">
            <div class="logo-container"><img src="img/logo.png" alt="" /></div>
            <div class="about">
                <div class="section-title">
                    Forgot Password
                </div>
                <div class="row">
                    <div class="large-6 medium-centered columns">
                        <form action="/forgot-password" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group with-icon">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                            </div>
                          <button type="submit" class="button btn-default send-btn">Send</button>
                        </form>
                    </div>
                </div>
            </div>
      </div>
    </div>
</div>

@endsection
