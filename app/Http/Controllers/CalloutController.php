<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CalloutController extends Controller
{
    public function index(){
        $mostViewedUrl = env('API_URL') . 'api/v1.0/callouts/?sort=-total_views&limit=5';
        $mostViewed = json_decode(file_get_contents($mostViewedUrl));

        $highestRankedUrl = env('API_URL') . 'api/v1.0/callouts/?sort=+total_votes&limit=5';
        $highestRanked = json_decode(file_get_contents($highestRankedUrl));

        return view('pages.most-viewed', compact('mostViewed','highestRanked'));
    }

    public function details($id){

        $url = env('API_URL') . 'api/v1.0/callouts/?q=id:' . $id;
        $callout = json_decode(file_get_contents($url));
        $callout = $callout['0'];

        //return response()->json($callout);
         return view('pages.callout', compact('callout'));
    }

}
