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
        $steamid = Session::get('steamid');
        $api = new SteamAPIController();
        //$data = $api->getLibraryVerbose('76561198025369330');
        $data = $api->getLibraryVerbose((string)$steamid);
        $data = $data["response"];
        return view('library', $data);
    }

    public function friends()
    {
        $steamid = Session::get('steamid');
        $api = new SteamAPIController();
        //$data = $api->getFriends('76561198025369330');
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
