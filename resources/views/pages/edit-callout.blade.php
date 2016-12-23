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
                    Edit Callout
                </div>
                <div class="row">
                    <div class="large-6 medium-centered columns">
                        @if(Session::has('error'))
                            <p style="color: #fff;">{!! Session::get('error') !!}</p>
                        @endif
                        <form action="/register" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <div class="small-6 columns">
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Fighter A">
                                </div>
                                <div class="small-6 columns">
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Fighter B">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="small-6 columns">
                                    <select>
                                      <option value="husker">Contest</option>
                                      <option value="starbuck">Starbuck</option>
                                      <option value="hotdog">Hot Dog</option>
                                      <option value="apollo">Apollo</option>
                                    </select>
                                </div>
                                <div class="small-6 columns">
                                    <select>
                                      <option value="husker">Fight Style</option>
                                      <option value="starbuck">Starbuck</option>
                                      <option value="hotdog">Hot Dog</option>
                                      <option value="apollo">Apollo</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <textarea name="name" rows="3" cols="40" placeholder="Fight Call Out Details"></textarea>
                            </div>
                            <div class="form-group row">
                                <div class="small-6 columns">
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Fight Date">
                                </div>
                                <div class="small-6 columns">
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Fight Time">
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" name="username" id="username" placeholder="Fight Venue">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="username" id="username" placeholder="Broadcasting URL">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="username" id="username" placeholder="Ticketing URL">
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
