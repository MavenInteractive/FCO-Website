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
                    @if (count($errors) > 0)
                        <div class="large-6 medium-centered columns validation-error">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="row">
                    <div class="large-6 medium-centered columns">
                        @if(Session::has('error'))
                            <p style="color: #fff;">{!! Session::get('error') !!}</p>
                        @endif
                        {!! Form::open(['route' => 'callout.store']) !!}
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <div class="small-6 columns">
                                    {!! Form::text('fighter_a', null, ['class' => 'form-control', 'id' => 'fighter_a','placeholder' => 'Fighter A'])!!}
                                </div>
                                <div class="small-6 columns">
                                    {!! Form::text('fighter_b', null, ['class' => 'form-control', 'id' => 'fighter_b','placeholder' => 'Fighter B'])!!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="small-6 columns">
                                    {!! Form::select('match_type', array('Fight' => 'Fight', 'Sparring' => 'Sparring'), null, array('class' => 'form-control', 'placeholder' => 'Contest')) !!}
                                </div>
                                <div class="small-6 columns">
                                    
                                    {!! Form::select('category_id', $categories, null, array('class' => 'form-control', 'placeholder' => 'Fight Style')) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::textArea('description', null, ['class' => 'form-control', 'rows' => 3, 'cols' => 40, 'placeholder' => 'Fight Call Out Details'])!!}
                            </div>
                            <div class="form-group row">
                                <div class="small-6 columns">
                                    <div class="with-icon">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                        {!! Form::text('details_date', null, ['class' => 'form-control', 'id' => 'datepicker','placeholder' => 'Fight Date'])!!}
                                    </div>
                                </div>
                                <div class="small-6 columns">
                                    <div class="with-icon">
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        {!! Form::time('details_time', null, ['class' => 'form-control', 'id' => 'details_time','placeholder' => 'Fight Time'])!!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group with-icon">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                {!! Form::text('details_venue', null, ['class' => 'form-control', 'id' => 'details_venue','placeholder' => 'Fight Venue'])!!}
                            </div>
                            <div class="form-group with-icon">
                                <i class="fa fa-map-signs" aria-hidden="true"></i>
                                {!! Form::text('broadcast_url', null, ['class' => 'form-control', 'id' => 'broadcast_url','placeholder' => 'Broadcasting URL'])!!}
                            </div>
                            <div class="form-group with-icon">
                                <i class="fa fa-ticket" aria-hidden="true"></i>
                                {!! Form::text('ticket_url', null, ['class' => 'form-control', 'id' => 'ticket_url','placeholder' => 'Ticketing URL'])!!}
                            </div>

                            <div class="row">
                                
                                <div class="small-6 columns mediaUploadContainer">
                                    <!-- <input id="uploadVideo"  name="video" type="file">
                                    <input id="uploadVid" name="uploadVid" type="hidden"> -->
                                </div>
                            </div>

                            <div class="row">
                                <div class="small-6 columns mediaUploadContainer">
                                {!! Form::hidden('uploadPhoto', null, ['id' => 'uploadPhoto'])!!}
                                    <button type="button" class="button uploadBtn" data-open="chooseUploadTakePhotoModal">
                                        <i class="fa fa-picture-o" aria-hidden="true"></i>
                                        Take or Upload Image
                                    </button>

                                    <!-- This is the first modal -->
                                    <div class="reveal" id="chooseUploadTakePhotoModal" data-reveal>
                                        <!-- Image Uploaded  -->
                                        <div class="small-12 columns successModalImage" style="display: none">
                                            Image Upload Success!
                                        </div>
                                        <div class="small-12 columns mediaUploadContainer imageButton">
                                            <div id="errorBlockImage" class="help-block"></div>
                                            <input id="uploadImage"  name="photo" type="file" multiple>
                                        </div>
                                        <div class="small-12 columns">
                                            <button id="take-image" type="button" class="button" data-open="takeImageModal">Take Image</button>
                                        </div>
                                      <button class="close-button" data-close aria-label="Close reveal" type="button">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>

                                    <!-- This is the nested modal -->
                                    <div class="reveal" id="takeImageModal" data-reveal>
                                        <video id="imagePlayer" class="video-js vjs-default-skin" width="640" height="480"></video>
                                      <button id="close-image" class="close-button" data-close aria-label="Close reveal" type="button">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                      <!-- Image Uploaded  -->
                                      <div class="small-12 columns successModalImage" style="display: none">
                                        Image Upload Success!
                                      </div>
                                      <button type="button" class="button" id="uploadTakenImage" style="width: 100%;margin-top: 10px; display:none;">Upload this Image</button>
                                    </div>

                                </div>
                                <div class="small-6 columns mediaUploadContainer">
                                    {!! Form::hidden('uploadVid', null, ['id' => 'uploadVid'])!!}
                                    <button type="button" class="button uploadBtn" data-open="chooseUploadTakeVideoModal">
                                        <i class="fa fa-play" aria-hidden="true"></i>
                                        Record or Upload Video
                                    </button>

                                    <!-- This is the first modal -->
                                    <div class="reveal" id="chooseUploadTakeVideoModal" data-reveal>
                                        <div class="small-12 columns successModalVideo" style="display: none">
                                            <button class="close-button" data-close aria-label="Close reveal" type="button">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                            Video Upload Success!
                                        </div>
                                        <div class="small-12 columns mediaUploadContainer videoButton">
                                            <div id="errorBlockVideo" class="help-block"></div>
                                            <input id="uploadVideo"  name="video" type="file" multiple>
                                        </div>
                                        <div class="small-12 columns">
                                            <button id="take-video" type="button" class="button" data-open="takeVideoModal">Take Video</button>
                                        </div>
                                      <button class="close-button" data-close aria-label="Close reveal" type="button">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>

                                    <!-- This is the nested modal -->
                                    <div class="reveal" id="takeVideoModal" data-reveal>
                                        <video id="videoPlayer" class="video-js vjs-default-skin" width="640" height="480"></video>
                                      <button id="close-video" class="close-button" data-close aria-label="Close reveal" type="button">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                       <!-- Video Uploaded  -->
                                       <div class="small-12 columns successModalVideo" style="display: none">
                                         Video Upload Success!
                                       </div>
                                       <button type="button" class="button" id="uploadTakenVideo" style="width: 100%;margin-top: 10px;display:none;">Upload this Video</button>
                                    </div>
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
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
      </div>
    </div>
</div>

@endsection
