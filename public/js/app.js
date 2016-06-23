$(document).foundation()

$(document).ready(function(){

    $('.fco-info').each(function(){
        $(this).click(function(){
            $url = $(this).data('url');
            window.location = $url;
        //    getData($url,$(this));
        });
    })

    var createTemplate = function($data){
        $image = 'http://fightcallout.inoc.me/api/v1.0/uploads/'+ $data.photo;

        var html =  '<div class="large-12 columns title-field">'+
                        '<div class="profile">' +
                            '<div class="thumb-img" style = "background-image: url('+ $image +')"></div>'+
                        '</div>' +
                        '<div class="title">' + $data.title + '</div>'+
                    '</div>' +
                    '<div class="large-12 columns flex-video video-holder">' +
                        '<iframe width="763" height="430" src="https://www.youtube.com/embed/hks_TtC5uC8" frameborder="0" allowfullscreen></iframe>' +
                    '</div>' +
                    '<div class="large-12 columns event-meta">' +
                        '<ul>' +
                            '<li class="fa fa-calendar">' +
                                '<span class="section-title">Event Date:</span>' +
                                '<span class="meta-data">' + '<?php date("M j, Y",strtotime($data.details_date)) ?>' + '</span>' +
                            '</li>' +
                            '<li class="fa fa-clock-o">' +
                                '<span class="section-title">Time:</span>' +
                                '<span class="meta-data">' + '<?php date("g:i a",strtotime($data.details_time)) ?>' +'</span>' +
                            '</li>' +
                            '<li class="fa fa-map-marker">' +
                                '<span class="section-title">Venue:</span>' +
                                '<span class="meta-data">' + $data.details_venue + '</span>' +
                            '</li>' +
                        '</ul>' +
                    '</div>' +
                    '<div class="small-9 columns event-summary">' +
                        '<div class="section-title"> Details </div>' +
                        '<div class="section-content">' + $data.description + '</div>' +
                        '<div class="button-container">' +
                            '<a href="#">Show More <i class="fa fa-angle-right" aria-hidden="true"></i></a>' +
                        '</div>' +
                    '</div>' +
                    '<div class="small-3 columns event-counter">' +
                        '<div class="section-title"> Views </div>' +
                        '<div class="section-content">' +
                            '<span class="views-counter">{{ number_format($callout->total_views) }}</span>' +
                            '<div class="reaction-counter">' +
                                '<ul>' +
                                    '<li class="fa fa-thumbs-o-up"><span>{{ number_format($callout->up) }}</span></li>' +
                                    '<li class="fa fa-thumbs-o-down"><span>{{ number_format($callout->down) }}</span></li>' +
                                '</ul>' +
                            '</div>' +
                        '</div>' +
                    '</div>' +
                    '<div class="small-6 columns announcements">' +
                        '<div class="section-title"><i class="fa fa-bullhorn" aria-hidden="true"></i> Announcements </div>' +
                        '<div class="section-content">' +
                            'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.' +
                        '</div>' +
                    '</div>' +
                    '<div class="small-6 columns tickets">' +
                        '<div class="section-title"><i class="fa fa-ticket" aria-hidden="true"></i> Tickets </div>' +
                        '<div class="section-content">' +
                            'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.' +
                        '</div>' +
                    '</div>' +
                    '<div class="large-12 columns event-buttons">' +
                        '<ul>' +
                            '<li><a href="" class="fa fa-thumbs-o-up"><span>Good Fight</span></a></li>' +
                            '<li><a href="" class="fa fa-thumbs-o-down"><span>Bad Fight</span></a></li>' +
                            '<li><a href="" class="fa fa-commenting"><span>Comments</span></a></li>' +
                            '<li><a href="" class="fa fa-share-alt"><span>Share</span></a></li>' +
                        '</ul>' +
                    '</div>'
                    ;

        return html;
    }

    var getData = function($link, $element){

        $infoContainer = $element.find('.more-info');

        $.ajax({
            url: $link,
            type: 'GET',
            dataType:'JSON',
            beforeSend: function(){
                $infoContainer.html('<div class="infinite-loader"><span class="loading" style="display:block"><i class="fa fa-facebook-square"></i></div>');
            }
        })
        .done(function(data) {
            $newTemplate = createTemplate(data);
            $infoContainer.html($newTemplate)
        });
    }



});
