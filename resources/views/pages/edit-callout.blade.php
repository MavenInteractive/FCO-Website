@extends('layouts.master')
@section('content')

<div class="container content">
    <div class="row">
      <div class="large-8 medium-centered columns">
            <div class="logo-container">
                @if(isset($callout->user->photo) && $callout->user->photo != NULL)
                    <img src="http://api.fightcallout.com/api/v1.0/uploads/{{$callout->user->photo}}" alt="" style="width: 125px;"/>
                @else
                    <img src="img/profile-placeholder.jpg" alt="" style="width: 125px;"/>
                @endif
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
                        <form action="/edit-callout/{{$callout->id}}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <div class="small-6 columns">
                                    <input type="text" class="form-control" name="fighter_a" id="fighter_a" placeholder="Fighter A" value="{{$callout->fighter_a}}">
                                </div>
                                <div class="small-6 columns">
                                    <input type="text" class="form-control" name="fighter_b" id="fighter_b" placeholder="Fighter B" value="{{$callout->fighter_b}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="small-6 columns">
                                    <select class="form-control" name="match_type">
                                      <option value="">Contest</option>
                                      <option value="Fight" <?php echo $callout->match_type == 'Fight' ? 'selected' : '' ?>>Fight</option>
                                      <option value="Sparring" <?php echo $callout->match_type == 'Sparring' ? 'selected' : '' ?>>Sparring</option>
                                    </select>
                                </div>
                                <div class="small-6 columns">
                                    <select class="form-control" name="category_id">
                                      <option value="">Fight Style</option>
                                      @foreach($categories as $category)
                                          <option value="{{$category->id}}" <?php echo $category->id == $callout->category_id ? 'selected' : '' ?>>{{$category->description}}</option>
                                      @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <textarea name="description" class="form-control" rows="3" cols="40" placeholder="Fight Call Out Details">{{$callout->description}}</textarea>
                            </div>
                            <div class="form-group row">
                                <div class="small-6 columns">
                                    <div class="with-icon">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                        <input type="text" class="form-control" name="details_date" id="datepicker" placeholder="Fight Date" value="{{$callout->details_date}}">
                                    </div>
                                </div>
                                <div class="small-6 columns">
                                    <div class="with-icon">
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        <input type="text" class="form-control" name="details_time" id="details_time" placeholder="Fight Time" value="{{$callout->details_time}}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group with-icon">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <input type="text" class="form-control" name="details_venue" id="details_venue" placeholder="Fight Venue" value="{{$callout->details_venue}}">
                            </div>
                            <div class="form-group with-icon">
                                <i class="fa fa-map-signs" aria-hidden="true"></i>
                                <input type="text" class="form-control" name="broadcast_url" id="broadcast_url" placeholder="Broadcasting URL" value="{{$callout->broadcast_url}}">
                            </div>
                            <div class="form-group with-icon">
                                <i class="fa fa-ticket" aria-hidden="true"></i>
                                <input type="text" class="form-control" name="ticket_url" id="ticket_url" placeholder="Ticketing URL" value="{{$callout->ticket_url}}">
                            </div>
                            <div class="row">
                                <div class="small-6 columns mediaUploadContainer">
                                    <button type="button" class="button uploadBtn" data-open="chooseUploadTakePhotoModal">
                                        <i class="fa fa-picture-o" aria-hidden="true"></i>
                                        Take or Upload Image
                                    </button>

                                    <!-- This is the first modal -->
                                    <div class="reveal" id="chooseUploadTakePhotoModal" data-reveal>
                                        <div class="small-12 columns mediaUploadContainer">
                                            <input id="uploadImage"  name="photo" type="file">
                                            <input id="uploadPhoto" name="uploadPhoto" type="hidden">
                                        </div>
                                        <div class="small-12 columns">
                                            <button type="button" class="button" data-open="takeImageModal">Take Image</button>
                                        </div>
                                      <button class="close-button" data-close aria-label="Close reveal" type="button">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>

                                    <!-- This is the nested modal -->
                                    <div class="reveal" id="takeImageModal" data-reveal>
                                        <video id="imagePlayer" class="video-js vjs-default-skin" width="640" height="480"></video>
                                      <button class="close-button" data-close aria-label="Close reveal" type="button">
                                        <span aria-hidden="true">&times;</span>
                                      </button>

                                      <button type="button" class="button" id="uploadTakenImage" style="width: 100%;margin-top: 10px; display:none;">Upload this Image</button>
                                    </div>

                                </div>
                                <div class="small-6 columns mediaUploadContainer">
                                    <button type="button" class="button uploadBtn" data-open="chooseUploadTakeVideoModal">
                                        <i class="fa fa-play" aria-hidden="true"></i>
                                        Record or Upload Video
                                    </button>

                                    <!-- This is the first modal -->
                                    <div class="reveal" id="chooseUploadTakeVideoModal" data-reveal>
                                        <div class="small-12 columns mediaUploadContainer">
                                            <input id="uploadVideo"  name="video" type="file">
                                            <input id="uploadVid" name="uploadVid" type="hidden">
                                        </div>
                                        <div class="small-12 columns">
                                            <button type="button" class="button" data-open="takeVideoModal">Take Video</button>
                                        </div>
                                      <button class="close-button" data-close aria-label="Close reveal" type="button">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>

                                    <!-- This is the nested modal -->
                                    <div class="reveal" id="takeVideoModal" data-reveal>
                                        <video id="videoPlayer" class="video-js vjs-default-skin" width="640" height="480"></video>
                                      <button class="close-button" data-close aria-label="Close reveal" type="button">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                       <button type="button" class="button" id="uploadTakenVideo" style="width: 100%;margin-top: 10px;display:none;">Upload this Video</button>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="callout_id" value="{{$callout->id}}">

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
