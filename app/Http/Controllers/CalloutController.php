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
                $mostViewedUrl = env('API_URL') . 'api/v1.0/callouts/?sort=-created_at&page='.$page.'&limit='.$limit;
                $mostViewed = json_decode(file_get_contents($mostViewedUrl));

                return response()->json($mostViewed);
            } else{
                $highestRankedUrl = env('API_URL') . 'api/v1.0/callouts/?sort=+total_views&page='.$page.'&limit='.$limit;
                $highestRanked = json_decode(file_get_contents($highestRankedUrl));

                return response()->json($highestRanked);
            }

        } else{

            $mostViewedUrl = env('API_URL') . 'api/v1.0/callouts/?sort=-created_at&page='.$page.'&limit='.$limit;
            $mostViewed = json_decode(file_get_contents($mostViewedUrl));

            $highestRankedUrl = env('API_URL') . 'api/v1.0/callouts/?sort=+total_views&page='.$page.'&limit='.$limit;
            $highestRanked = json_decode(file_get_contents($highestRankedUrl));

            return view('pages.most-viewed', compact('mostViewed','highestRanked'));
        }


    }

    public function details($id){

        $url = env('API_URL') . 'api/v1.0/callouts/?q=id:' . $id;
        $callout = json_decode(file_get_contents($url));
        $callout = $callout['0'];

        if (Request::ajax()){
            return response()->json($callout);
        } else {
            return view('pages.callout', compact('callout'));
        }

    }

    public function login(){

        $input = \Request::only('email', 'password');

        $url = env('API_URL') . 'api/v1.0/auth/login';

        $fields = $input;

        //url-ify the data for the POST
        $fields_string = '';
        foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
        rtrim($fields_string, '&');

        $ch = curl_init();

        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, count($fields));
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch,  CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($ch);

        curl_close($ch);

        return response()->json(json_decode(rtrim($result,'1')));

    }

    public function comments(){

        $input = \Request::only('callout_id');

        $url = env('API_URL') . 'api/v1.0/comments/?q=callout_id:' . $input['callout_id'];
        $comments = json_decode(file_get_contents($url));

        if (Request::ajax()){
            return response()->json($comments);
        }

    }

    public function addComment(){

        $input = \Request::only('user_id', 'callout_id', 'details', 'status','token');

        $url = env('API_URL') . 'api/v1.0/comments';

        $fields = $input;

        //url-ify the data for the POST
        $fields_string = '';
        foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
        rtrim($fields_string, '&');

        $ch = curl_init();
        $header[] = 'Authorization: Bearer '.$input['token'];
        curl_setopt($ch, CURLOPT_HTTPHEADER,$header);
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, count($fields));
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch,  CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($ch);

        curl_close($ch);

        return response()->json(json_decode(rtrim($result,'1')));

    }

    public function sendMessage(){
        $input = \Request::only('email', 'subject', 'message');

        Mail::send('emails.contact', array('fullname' => $associate->fullname), function($message) use ($associate){
            $message->to($associate->email, $associate->fullname)->subject($input->subject);
        });

        return;
    }

}
