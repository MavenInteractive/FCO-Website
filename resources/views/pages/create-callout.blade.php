@extends('layouts.master')
@section('content')

<div class="container content">
    <div class="row">
      <div class="large-8 medium-centered columns">
            <div class="logo-container">
                @if(isset($profile->photo) && $profile->photo != NULL)
                    <img src="http://api.fightcallout.com/api/v1.0/uploads/{{$profile->photo}}" alt="" style="width: 125px;"/>
                @else
                    <img src="img/profile-placeholder.jpg" alt="" style="width: 125px;"/>
                @endif
            </div>

            <div class="about">
                <div class="section-title">
                    Create Callout
                </div>
                <div class="row">
                    <div class="large-6 medium-centered columns">
                        @if(Session::has('error'))
                            <p style="color: #fff;">{!! Session::get('error') !!}</p>
                        @endif
                        <form action="/create-callout" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <div class="small-6 columns">
                                    <input type="text" class="form-control" name="fighter_a" id="fighter_a" placeholder="Fighter A">
                                </div>
                                <div class="small-6 columns">
                                    <input type="text" class="form-control" name="fighter_b" id="fighter_b" placeholder="Fighter B">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="small-6 columns">
                                    <select class="form-control" name="match_type">
                                      <option value="">Contest</option>
                                      <option value="Fight">Fight</option>
                                      <option value="Sparring">Sparring</option>
                                    </select>
                                </div>
                                <div class="small-6 columns">
                                    <select class="form-control" name="category_id">
                                      <option value="">Fight Style</option>
                                      @foreach($categories as $category)
                                          <option value="{{$category->id}}">{{$category->description}}</option>
                                      @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <textarea class="form-control" name="description" rows="3" cols="40" placeholder="Fight Call Out Details"></textarea>
                            </div>
                            <div class="form-group row">
                                <div class="small-6 columns">
                                    <div class="with-icon">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                        <input type="text" class="form-control" name="details_date" id="datepicker" placeholder="Fight Date">
                                    </div>
                                </div>
                                <div class="small-6 columns">
                                    <div class="with-icon">
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        <input type="text" class="form-control" name="details_time" id="details_time" placeholder="Fight Time">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group with-icon">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <input type="text" class="form-control" name="details_venue" id="details_venue" placeholder="Fight Venue">
                            </div>
                            <div class="form-group with-icon">
                                <i class="fa fa-map-signs" aria-hidden="true"></i>
                                <input type="text" class="form-control" name="broadcast_url" id="broadcast_url" placeholder="Broadcasting URL">
                            </div>
                            <div class="form-group with-icon">
                                <i class="fa fa-ticket" aria-hidden="true"></i>
                                <input type="text" class="form-control" name="ticket_url" id="ticket_url" placeholder="Ticketing URL">
                            </div>

                            <div class="row">
                                <div class="small-6 columns mediaUploadContainer">
                                    <input id="uploadImage" name="photo" type="file">
                                </div>
                                <div class="small-6 columns mediaUploadContainer">
                                    <input id="uploadVideo" name="video" type="file">
                                </div>
                            </div>

                            <div class="row">
                                <div class="small-6 columns">
                                    <button type="reset" class="button btn-default send-btn">Cancel</button>
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
