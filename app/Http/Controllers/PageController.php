<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\SteamAPIController;
use App\Http\Requests;
use Session;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function game($AppID)
    {
        $api = new SteamAPIController();
        $SteamID = Session::get("steamid");
        //$SteamID = '76561198025369330';
        $data["achievements"] = $api->getAchievements($SteamID, $AppID)["playerstats"]["achievements"];
        $data["schema"] = $api->getSchema($AppID)["game"]["availableGameStats"]["achievements"];
        $data["percentages"] = $api->getAchievementPercentage($AppID)["achievementpercentages"]["achievements"];
        $data["SteamID"] = $SteamID;
        $data["AppID"] = $AppID;

        return view('game', $data);
    }

    public function profile()
    {
        $api = new SteamAPIController();
        $SteamID = Session::get("steamid");
        //$SteamID = '76561198025369330';
        $array = array();
        array_push($array, $SteamID);
        $data = $api->getPlayerSummaries($array)["response"]["players"][0];
        
        return view('profile', $data);
    }
}
