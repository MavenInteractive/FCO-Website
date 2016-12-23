@extends('layouts.master')
@section('content')

<div class="container content">
    <div class="row">
      <div class="large-8 medium-centered columns">
            <div class="logo-container">
                <img src="img/profile-placeholder.jpg" alt="" style="width: 125px;"/>
            </div>
            <div class="about">
                <div class="section-title">
                    Edit Profile
                </div>
                <div class="row">
                    <div class="large-6 medium-centered columns">
                        @if(Session::has('error'))
                            <p style="color: #fff;">{!! Session::get('error') !!}</p>
                        @endif
                        <form action="/register" method="POST">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <select>
                                    <option value="husker">Fight Style</option>
                                    <option value="starbuck">Starbuck</option>
                                    <option value="hotdog">Hot Dog</option>
                                    <option value="apollo">Apollo</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select>
                                    <option value="husker">Fight Style</option>
                                    <option value="starbuck">Starbuck</option>
                                    <option value="hotdog">Hot Dog</option>
                                    <option value="apollo">Apollo</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select>
                                    <option value="husker">Fight Style</option>
                                    <option value="starbuck">Starbuck</option>
                                    <option value="hotdog">Hot Dog</option>
                                    <option value="apollo">Apollo</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                            </div>

                            <div class="row">
                                <div class="small-6 columns">
                                    <button type="submit" class="button btn-default send-btn">Cancel</button>
                                </div>
                                <div class="small-6 columns">
                                    <button type="submit" class="button btn-default send-btn">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
      </div>
    </div>
</div>

@endsection
