<?php
namespace App\Http\Services;

use Illuminate\Support\Facades\Http;

class YoutubeService {
    
    public function getVideoLists() {

        $part = 'snippet';
        $youTubeEndPoint = \config('services.youtube.search_endpoint');
        $apiKey = \config('services.youtube.api_key');
        $channelId = \config('services.youtube.channel_id');
        $maxResults = 50;

        $url = "$youTubeEndPoint?key= $apiKey&maxResults=$maxResults&channelId=$channelId&part= $part,id&order=date";

        $response = Http::get($url);
        $results = json_decode($response);

        return $results;
    }

    public function getSingleVideo($id) {
        $part = 'snippet';
        $apiKey = \config('services.youtube.api_key');
       

        $url = "https://www.googleapis.com/youtube/v3/videos?part=$part&id=$id&key=$apiKey";
        $response  = Http::get($url);
        $results = json_decode($response);
         return $results;
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