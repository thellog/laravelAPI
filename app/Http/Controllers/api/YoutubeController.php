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

    public function getSingleVideo($id) {
        $part = 'snippet';
        $apiKey = \config('services.youtube.api_key');
       

        $url = "https://www.googleapis.com/youtube/v3/videos?part=$part&id=$id&key=$apiKey";
        $response  = Http::get($url);
         return $response->body();
    }

    public function getVideoByCategory($categoryId)
    {
        $youTubeEndPoint = \config('services.youtube.search_endpoint');
        $part = 'snippet';
        $apiKey = \config('services.youtube.api_key');
        $channelId = \config('services.youtube.channel_id');
        $url = " $youTubeEndPoint?part=$part&type=video&videoCategoryId=$categoryId&key= $apiKey&channelId=$channelId";

        $response = Http::get($url);

        return $response->body();

    }
}
