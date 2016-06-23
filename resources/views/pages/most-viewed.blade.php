@extends('layouts.master')
@section('content')

    <div class="container content">
        <div class="row">
          <div class="large-8 medium-centered columns">
              <ul class="tabs fco-tabs" data-tabs id="fco-tabs-most-viewed">
                <li class="tabs-title is-active"><a href="#most-viewed" aria-selected="true">Most Viewed</a></li>
                <li class="tabs-title"><a href="#highest-ranked">Highest Ranked</a></li>
              </ul>
              <div class="tabs-content" data-tabs-content="fco-tabs-most-viewed">
                  <div class="tabs-panel is-active" id="most-viewed">
                      <div class="fco-table">
                        <div class="head">
                            <div class="small-2 columns">&nbsp;</div>
                            <div class="small-5 columns">Call Out</div>
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
                                <div class="small-2 columns profile-img">
                                    <?php $image = env('API_URL').'api/v1.0/uploads/'. $mv->photo; ?>
                                    <div class="thumb-img" style = 'background-image: url({{$image}})'></div>
                                </div>
                                <div class="small-5 columns details">{{ $mv->title }}</div>
                                <div class="small-2 columns">{{ date('M j, Y',strtotime($mv->details_date)) }}</div>
                                <div class="small-3 columns">{{ $mv->details_venue }}</div>
                                <div class="small-12 columns more-info"></div>
                            </div>
                        <?php endforeach; ?>

                      </div>
                      <button type="button" name="button" class="button show-more"> Show more ></button>
                  </div>
                  <div class="tabs-panel" id="highest-ranked">
                      <div class="fco-table">
                        <div class="head">
                            <div class="small-2 columns">&nbsp;</div>
                            <div class="small-5 columns">Call Out</div>
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
                                <div class="small-2 columns profile-img">
                                    <?php $image = env('API_URL').'api/v1.0/uploads/'. $hr->photo; ?>
                                    <div class="thumb-img" style = 'background-image: url({{$image}})'></div>
                                </div>
                                <div class="small-5 columns details">{{ $hr->title }}</div>
                                <div class="small-2 columns">{{ date('M j, Y',strtotime($hr->details_date)) }}</div>
                                <div class="small-3 columns">{{ $hr->details_venue }}</div>
                            </div>
                        <?php endforeach; ?>
                      </div>
                      <button type="button" name="button" class="button show-more"> Show more ></button>
              </div>
          </div>
        </div>
    </div>

@endsection
