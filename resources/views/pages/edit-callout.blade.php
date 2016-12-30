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
                                    <select name="match_type">
                                      <option value="">Contest</option>
                                      <option value="Fight" <?php echo $callout->match_type == 'Fight' ? 'selected' : '' ?>>Fight</option>
                                      <option value="Sparring" <?php echo $callout->match_type == 'Sparring' ? 'selected' : '' ?>>Sparring</option>
                                    </select>
                                </div>
                                <div class="small-6 columns">
                                    <select name="category_id">
                                      <option value="">Fight Style</option>
                                      @foreach($categories as $category)
                                          <option value="{{$category->id}}" <?php echo $category->id == $callout->category_id ? 'selected' : '' ?>>{{$category->description}}</option>
                                      @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <textarea name="description" rows="3" cols="40" placeholder="Fight Call Out Details">{{$callout->description}}</textarea>
                            </div>
                            <div class="form-group row">
                                <div class="small-6 columns">
                                    <input type="text" class="form-control" name="details_date" id="datepicker" placeholder="Fight Date" value="{{$callout->details_date}}">
                                </div>
                                <div class="small-6 columns">
                                    <input type="text" class="form-control" name="details_time" id="details_time" placeholder="Fight Time" value="{{$callout->details_time}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" name="details_venue" id="details_venue" placeholder="Fight Venue" value="{{$callout->details_venue}}">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="broadcast_url" id="broadcast_url" placeholder="Broadcasting URL" value="{{$callout->broadcast_url}}">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="ticket_url" id="ticket_url" placeholder="Ticketing URL" value="{{$callout->ticket_url}}">
                            </div>
                            <input type="hidden" name="callout_id" value="{{$callout->id}}">

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
