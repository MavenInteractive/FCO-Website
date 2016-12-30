@extends('layouts.master')
@section('content')

<div class="container content">
    <div class="row">
      <div class="large-8 medium-centered columns">
            <div class="logo-container">
                <?php if(isset($profile->photo)){
                    $image = 'http://api.fightcallout.com/api/v1.0/uploads/'.$profile->photo;
                } else {
                    $image = '/img/profile-placeholder.jpg';
                } ?>
                <img src="{{$image}}" alt="" style="width: 150px;"/>
            </div>
            <div class="about">
                <div class="section-title">
                    Profile
                </div>
                <div class="row">
                    <div class="large-6 medium-centered columns">
                        <div class="small-6 columns profile-info-label">Username:</div>
                        <div class="small-6 columns profile-info-detail">{{$profile->username}}</div>

                        <div class="small-6 columns profile-info-label">First Name:</div>
                        <div class="small-6 columns profile-info-detail">{{$profile->first_name}}</div>

                        <div class="small-6 columns profile-info-label">Last Name:</div>
                        <div class="small-6 columns profile-info-detail">{{$profile->last_name}}</div>

                        <div class="small-6 columns profile-info-label">Role:</div>
                        <div class="small-6 columns profile-info-detail">{{$role->description}}</div>

                        <div class="small-6 columns profile-info-label">Fighting Style:</div>
                        <div class="small-6 columns profile-info-detail">{{$category->description}}</div>

                        <div class="small-6 columns profile-info-label">Country:</div>
                        <div class="small-6 columns profile-info-detail">{{$country->description}}</div>
                    </div>
                </div>
                <div class="row">

                    <div class="large-6 medium-centered columns">
                        <div class="section-title">
                            Callouts
                        </div>
                @foreach($callouts as $callout)
                    <div class="profile-callouts">
                        <div class="row fco-info" data-url="{{url('/')}}/callout/{{ $callout->id }}">
                            <div class="small-3 large-2 columns profile-img">
                                <?php $image = env('API_URL').'api/v1.0/uploads/'. $profile->photo; ?>
                                <div class="thumb-img" style = 'background-image: url({{$image}})'></div>
                            </div>
                            <div class="small-9 large-10 columns details">
                                CALLS-OUT <span class="fighter">{{$callout->fighter_a}} <?= !empty($callout->fighter_b) ? '& '. $callout->fighter_b : NULL; ?></span>
                                for a <span class="match">{{$callout->category->description}} {{$callout->match_type}}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
                    </div>
                </div>

            </div>
      </div>
    </div>
</div>

@endsection
