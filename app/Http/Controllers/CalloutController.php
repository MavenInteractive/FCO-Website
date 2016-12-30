<?php

namespace App\Http\Controllers;

use Request;
use Session;
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

    public function getRegister(){
        return view('pages.register');
    }

    public function postRegister(){
        $input = \Request::only('email', 'username', 'password', 'confirm_password','token');

        $url = env('API_URL') . 'api/v1.0/auth/register';

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

        $data = json_decode($result);

        if(!isset($data->error)){
            return redirect('/login');
        } else{
            Session::flash('error', ucwords(str_replace('_', ' ', $data->error)));
            return redirect('/register');
        }

        return response()->json(json_decode($result));
    }

    public function getLogin(){
        return view('pages.login');
    }

    public function postLogin(){
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

        $data = json_decode($result);

        if(!isset($data->error)){
            setcookie("token", $data->token);
            setcookie("user_id", $data->user->id);
            return redirect('/');
        } else{
            Session::flash('error_login', ucwords(str_replace('_', ' ', $data->error)));
            return redirect('/login');
        }


    }

    public function getCreateCallout(){
        if(isset($_COOKIE["token"]) && isset($_COOKIE["user_id"])){
            $url = env('API_URL') . 'api/v1.0/categories';

            $ch = curl_init();

            curl_setopt($ch,CURLOPT_URL, $url);
            curl_setopt($ch,  CURLOPT_RETURNTRANSFER, 1);

            $result = curl_exec($ch);

            curl_close($ch);

            $categories = json_decode($result);

            return view('pages.create-callout',['categories' => $categories]);
        } else {
            return redirect('/login');
        }
    }

    public function postCreateCallout(){
        if(isset($_COOKIE["token"]) && isset($_COOKIE["user_id"])){
            $input = \Request::only('fighter_a','fighter_b','match_type','category_id','description','details_date','details_time','details_venue','broadcast_url','ticket_url');

            $input['user_id'] = $_COOKIE["user_id"];

            $url = env('API_URL') . 'api/v1.0/callouts';

            $fields = $input;

            //url-ify the data for the POST
            $fields_string = '';
            foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
            rtrim($fields_string, '&');

            $ch = curl_init();
            $header[] = 'Authorization: Bearer '.$_COOKIE["token"];
            curl_setopt($ch, CURLOPT_HTTPHEADER,$header);
            curl_setopt($ch,CURLOPT_URL, $url);
            curl_setopt($ch,CURLOPT_POST, count($fields));
            curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
            curl_setopt($ch,  CURLOPT_RETURNTRANSFER, 1);

            $result = curl_exec($ch);

            curl_close($ch);

            return redirect('/');

        } else {
            return redirect('/login');
        }

    }

    public function getEditCallout(){

        if(isset($_COOKIE["token"]) && isset($_COOKIE["user_id"])){
            $input = \Request::only('id');

            $url = env('API_URL') . 'api/v1.0/callouts/'.$input['id'].'/edit';

            $ch = curl_init();
            $header[] = 'Authorization: Bearer '.$_COOKIE["token"];
            curl_setopt($ch, CURLOPT_HTTPHEADER,$header);
            curl_setopt($ch,CURLOPT_URL, $url);
            curl_setopt($ch,  CURLOPT_RETURNTRANSFER, 1);

            $result = curl_exec($ch);

            curl_close($ch);

            $callout = json_decode($result);



            $url = env('API_URL') . 'api/v1.0/categories';
            $ch = curl_init();
            curl_setopt($ch,CURLOPT_URL, $url);
            curl_setopt($ch,  CURLOPT_RETURNTRANSFER, 1);
            $result = curl_exec($ch);
            curl_close($ch);
            $categories = json_decode($result);

            if(isset($callout->error)){
                return redirect('/');
            }
            return view('pages.edit-callout',['categories'=> $categories, 'callout' => $callout] );

        } else {
            return redirect('/login');
        }
    }

    public function postEditCallout($id){
        if(isset($_COOKIE["token"]) && isset($_COOKIE["user_id"])){
            $input = \Request::only('fighter_a','fighter_b','match_type','category_id','description','details_date','details_time','details_venue','broadcast_url','ticket_url');

            $input['user_id'] = $_COOKIE["user_id"];

            $url = env('API_URL') . 'api/v1.0/callouts/'.$id;

            $fields = $input;

            //url-ify the data for the POST
            $fields_string = '';
            foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
            rtrim($fields_string, '&');

            $ch = curl_init();
            $header[] = 'Authorization: Bearer '.$_COOKIE["token"];
            curl_setopt($ch, CURLOPT_HTTPHEADER,$header);
            curl_setopt($ch,CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
            curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($fields));
            curl_setopt($ch,  CURLOPT_RETURNTRANSFER, 1);

            $result = curl_exec($ch);

            curl_close($ch);

            return redirect('/callout/'.$id);

        } else {
            return redirect('/login');
        }
    }

    public function getUserProfile(){
        if(isset($_COOKIE["token"]) && isset($_COOKIE["user_id"])){

            $url = env('API_URL') . 'api/v1.0/users/'.$_COOKIE["user_id"].'/edit';

            $ch = curl_init();
            $header[] = 'Authorization: Bearer '.$_COOKIE["token"];
            curl_setopt($ch, CURLOPT_HTTPHEADER,$header);
            curl_setopt($ch,CURLOPT_URL, $url);
            curl_setopt($ch,  CURLOPT_RETURNTRANSFER, 1);

            $result = curl_exec($ch);

            curl_close($ch);

            $profile = json_decode($result);

            $url = env('API_URL') . 'api/v1.0/roles?q=id:'.$profile->role_id;
            $ch = curl_init();
            $header1[] = 'Authorization: Bearer '.$_COOKIE["token"];

            curl_setopt($ch, CURLOPT_HTTPHEADER,$header1);
            curl_setopt($ch,CURLOPT_URL, $url);
            curl_setopt($ch,  CURLOPT_RETURNTRANSFER, 1);

            $result = curl_exec($ch);

            curl_close($ch);

            $role = json_decode($result);

            $url = env('API_URL') . 'api/v1.0/categories?q=id:'.$profile->category_id;
            $ch = curl_init();
            curl_setopt($ch,CURLOPT_URL, $url);
            curl_setopt($ch,  CURLOPT_RETURNTRANSFER, 1);
            $result = curl_exec($ch);
            curl_close($ch);
            $category = json_decode($result);

            $url = env('API_URL') . 'api/v1.0/countries';
            $countries = json_decode(file_get_contents($url));

            $url = env('API_URL') . 'api/v1.0/users/'.$_COOKIE["user_id"].'/callouts';

            $ch = curl_init();
            $header2[] = 'Authorization: Bearer '.$_COOKIE["token"];
            curl_setopt($ch, CURLOPT_HTTPHEADER,$header2);
            curl_setopt($ch,CURLOPT_URL, $url);
            curl_setopt($ch,  CURLOPT_RETURNTRANSFER, 1);

            $result = curl_exec($ch);

            curl_close($ch);

            $callouts = json_decode($result);

            return view('pages.profile',['profile' => $profile,'category' => $category[0], 'country' => $countries[$profile->country_id - 1 ], 'role' => $role[0], 'callouts' => $callouts]);

        } else {
            return redirect('/login');
        }
    }

    public function getProfileEdit(){
        if(isset($_COOKIE["token"]) && isset($_COOKIE["user_id"])){

            $url = env('API_URL') . 'api/v1.0/users/'.$_COOKIE["user_id"].'/edit';

            $ch = curl_init();
            $header[] = 'Authorization: Bearer '.$_COOKIE["token"];
            curl_setopt($ch, CURLOPT_HTTPHEADER,$header);
            curl_setopt($ch,CURLOPT_URL, $url);
            curl_setopt($ch,  CURLOPT_RETURNTRANSFER, 1);

            $result = curl_exec($ch);

            curl_close($ch);

            $profile = json_decode($result);

            $url = env('API_URL') . 'api/v1.0/roles';
            $ch = curl_init();
            $header1[] = 'Authorization: Bearer '.$_COOKIE["token"];

            curl_setopt($ch, CURLOPT_HTTPHEADER,$header1);
            curl_setopt($ch,CURLOPT_URL, $url);
            curl_setopt($ch,  CURLOPT_RETURNTRANSFER, 1);

            $result = curl_exec($ch);

            curl_close($ch);

            $roles = json_decode($result);

            $url = env('API_URL') . 'api/v1.0/countries';
            $countries = json_decode(file_get_contents($url));

            $url = env('API_URL') . 'api/v1.0/categories';
            $categories= json_decode(file_get_contents($url));

            return view('pages.edit-profile',['profile' => $profile, 'roles' => $roles,'countries' => $countries, 'categories'=> $categories]);
        } else {
            return redirect('/login');
        }
    }

    public function postProfileEdit(){
        if(isset($_COOKIE["token"]) && isset($_COOKIE["user_id"])){
            $input = \Request::only('first_name', 'last_name', 'email', 'role_id', 'category_id', 'country_id', 'birth_date', 'gender','photo');

            if(isset($input['photo'])){

                $url = env('API_URL') . 'api/v1.0/users/'.$_COOKIE["user_id"].'/upload';

                $fields = array(
                    'photo' => '@'. $input['photo']->getRealPath()
                );

                //url-ify the data for the POST
                // $fields_string = '';
                // foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
                // rtrim($fields_string, '&');

                $ch = curl_init();
                $headerphoto[] = 'Authorization: Bearer '.$_COOKIE["token"];
                curl_setopt($ch, CURLOPT_HTTPHEADER,$headerphoto);
                curl_setopt($ch,CURLOPT_URL, $url);
                curl_setopt($ch,CURLOPT_POST, 1);
                curl_setopt($ch,CURLOPT_POSTFIELDS, $fields);
                curl_setopt($ch,  CURLOPT_RETURNTRANSFER, 1);

                $result = curl_exec($ch);

                curl_close($ch);

                $result = json_decode($result);

                dd($result);
            }

            $url = env('API_URL') . 'api/v1.0/users/'.$_COOKIE["user_id"];

            $fields = $input;

            //url-ify the data for the POST
            $fields_string = '';
            foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
            rtrim($fields_string, '&');

            $ch = curl_init();
            $header[] = 'Authorization: Bearer '.$_COOKIE["token"];
            curl_setopt($ch, CURLOPT_HTTPHEADER,$header);
            curl_setopt($ch,CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
            curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($fields));
            curl_setopt($ch,  CURLOPT_RETURNTRANSFER, 1);

            $result = curl_exec($ch);

            curl_close($ch);

            $result = json_decode($result);

            if(isset($result->error)){
                return redirect('/edit-profile');
            }
            if(isset($result->success)){
                return redirect('/profile');
            }

        } else {
            return redirect('/login');
        }
    }

}
