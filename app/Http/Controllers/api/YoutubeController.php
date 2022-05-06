<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class YouTubeController extends Controller
{
    public function getVideoLists() {

        $part = 'snippet';
        $youTubeEndPoint = \config('services.youtube.search_endpoint');
        $apiKey = \config('services.youtube.api_key');
        $channelId = \config('services.youtube.channel_id');

        $url = "$youTubeEndPoint?key= $apiKey&channelId=$channelId&part= $part,id&order=date";

        $response = Http::get($url);
        $results = json_decode($response);

        return $response->body();
    }
}
