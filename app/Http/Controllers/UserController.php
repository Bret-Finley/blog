<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SteamAPIController;
use App\Steamapps;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request, [
            'steamid' => 'required|numeric'
            ]);
        $input = $request->all();
        $id = $input["steamid"];
        $api = new SteamAPIController();
        $array = array();
        array_push($array, $id);
        $data = $api->getPlayerSummaries($array)["response"]["players"];
        return $data;

        if(empty($data) || $data["communityvisibilitystate"] == -1)
        {
            return redirect('/');
        }

        Session::put('steamid', $id);

        return redirect('/');
    }

    public function logout()
    {
        Session::forget('steamid');

        return redirect('/');
    }

    public function library()
    {
        if(!Session::has('steamid'))
        {
            return redirect('/');
        }

        $steamid = Session::get('steamid');
        $api = new SteamAPIController();
        $data = $api->getLibraryVerbose((string)$steamid);
        $data = $data["response"];
        return view('library', $data);
    }

    public function friends()
    {
        if(!Session::has('steamid'))
        {
            return redirect('/');
        }

        $steamid = Session::get('steamid');
        $api = new SteamAPIController();
        $data = $api->getFriends((string)$steamid);
        $friends = $data["friendslist"];
        $friends = $friends["friends"];
        $array = array();
        foreach($friends as $friend)
        {
            array_push($array, $friend["steamid"]);
        }

        $data = $api->getPlayerSummaries($array);
        $data = $data["response"];

        return view('friends', $data);
    }
}
