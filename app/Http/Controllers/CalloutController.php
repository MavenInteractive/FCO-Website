<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;

class CalloutController extends Controller
{
    public function index(){

        $input = \Request::only('page','limit','sort');
        if(isset($input['page']) && !empty($input['page'])){
            $page = $input['page'];
        }
        else{
            $page = 0;
        }
        if(isset($input['limit']) && !empty($input['limit'])){
            $limit = $input['limit'];
        }
        else{
            $limit = 10;
        }



        if (Request::ajax()){
            if(isset($input['sort']) && $input['sort'] == 'views'){
                $mostViewedUrl = env('API_URL') . 'api/v1.0/callouts/?sort=-total_views&page='.$page.'&limit='.$limit;
                $mostViewed = json_decode(file_get_contents($mostViewedUrl));

                return response()->json($mostViewed);
            } else{
                $highestRankedUrl = env('API_URL') . 'api/v1.0/callouts/?sort=+total_votes&page='.$page.'&limit='.$limit;
                $highestRanked = json_decode(file_get_contents($highestRankedUrl));

                return response()->json($highestRanked);
            }

        } else{

            $mostViewedUrl = env('API_URL') . 'api/v1.0/callouts/?sort=-total_views&page='.$page.'&limit='.$limit;
            $mostViewed = json_decode(file_get_contents($mostViewedUrl));

            $highestRankedUrl = env('API_URL') . 'api/v1.0/callouts/?sort=+total_votes&page='.$page.'&limit='.$limit;
            $highestRanked = json_decode(file_get_contents($highestRankedUrl));

            return view('pages.most-viewed', compact('mostViewed','highestRanked'));
        }


    }

    public function details($id){

        $url = env('API_URL') . 'api/v1.0/callouts/?q=id:' . $id;
        $callout = json_decode(file_get_contents($url));
        $callout = $callout['0'];

        //return response()->json($callout);
         return view('pages.callout', compact('callout'));
    }

}
