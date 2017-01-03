@extends('layouts.master')
@section('content')

    <div class="container content">
        <div class="row">
          <div class="large-8 medium-centered columns">
              <ul class="tabs fco-tabs" data-tabs id="fco-tabs-most-viewed">
                <li class="tabs-title is-active"><a href="#most-viewed" aria-selected="true">Latest</a></li>
                <li class="tabs-title"><a href="#highest-ranked">Most Viewed</a></li>
                <li><a href="/create-callout" class="button" id="createCallout" style="float: right;">Create Callout</a></li>
              </ul>
              <div class="tabs-content" data-tabs-content="fco-tabs-most-viewed">
                  <div class="tabs-panel is-active" id="most-viewed">
                      <div class="fco-table">
                        <div class="head">
                            <div class="small-3 large-2 columns">&nbsp;</div>
                            <div class="small-4 large-5 columns">Call Out</div>
                            <div class="small-2 columns">Date</div>
                            <div class="small-3 columns">Venue</div>
                        </div>
                        <?php $stat = 'even'; ?>
                        <?php foreach ($mostViewed as $mv): ?>
                            <?php if($stat == 'even'){
                                $stat = 'odd';
                            } else{
                                $stat = 'even';
                            } ?>
                            <div class="{{ $stat }} fco-info" data-url="{{url('/')}}/callout/{{ $mv->id }}">
                                <div class="small-3 large-2 columns profile-img">
                                    <?php $image = env('API_URL').'api/v1.0/uploads/'. $mv->user->photo; ?>
                                    <div class="thumb-img" style = 'background-image: url({{$image}})'></div>
                                </div>
                                <div class="small-4 large-5 columns details">
                                    <span class="user">{{$mv->user->username}}</span> CALLS-OUT <span class="fighter">{{$mv->fighter_a}} <?= !empty($mv->fighter_b) ? '& '. $mv->fighter_b : NULL; ?></span>
                                    for a <span class="match">{{$mv->category->description}} {{$mv->match_type}}</span>
                                </div>
                                <div class="small-2 columns">&nbsp;{{ date('M. j, Y',strtotime($mv->details_date)) }}</div>
                                <div class="small-3 columns venue">&nbsp;{{ $mv->details_venue }}</div>
                                <div class="small-12 columns more-info"></div>
                            </div>
                        <?php endforeach; ?>

                      </div>
                      <button type="button" name="button" class="button show-more" data-page='1' data-sort='views'> Show more ></button>
                  </div>
                  <div class="tabs-panel" id="highest-ranked">
                      <div class="fco-table">
                        <div class="head">
                            <div class="small-3 large-2 columns">&nbsp;</div>
                            <div class="small-4 large-5 columns">Call Out</div>
                            <div class="small-2 columns">Date</div>
                            <div class="small-3 columns">Venue</div>
                        </div>
                        <?php $stat1 = 'even'; ?>
                        <?php foreach ($highestRanked as $hr): ?>
                            <?php if($stat1 == 'even'){
                                $stat1 = 'odd';
                            } else{
                                $stat1 = 'even';
                            } ?>
                            <div class="{{ $stat1 }} fco-info" data-url="{{url('/')}}/callout/{{ $hr->id }}">
                                <div class="small-3 large-2 columns profile-img">
                                    <?php $image = env('API_URL').'api/v1.0/uploads/'. $hr->user->photo; ?>
                                    <div class="thumb-img" style = 'background-image: url({{$image}})'></div>
                                </div>
                                <div class="small-4 large-5 columns details">
                                    <span class="user">{{$hr->user->username}}</span> CALLS-OUT <span class="fighter">{{$hr->fighter_a}} <?= !empty($hr->fighter_b) ? '& '. $hr->fighter_b : NULL; ?></span>
                                    for a <span class="match">{{$hr->category->description}} {{$hr->match_type}}</span>
                                </div>
                                <div class="small-2 columns">&nbsp;{{ date('M. j, Y',strtotime($hr->details_date)) }}</div>
                                <div class="small-3 columns venue">&nbsp;{{ $hr->details_venue }}</div>
                            </div>
                        <?php endforeach; ?>
                      </div>
                      <button type="button" name="button" class="button show-more"  data-page='1' data-sort='votes'> Show more ></button>
              </div>
          </div>
      </div>
        </div>
    </div>

@endsection
