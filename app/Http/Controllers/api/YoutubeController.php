<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Services\YoutubeService;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class YouTubeController extends Controller
{
    protected $youtubeService;

    public function __construct(YoutubeService $youtubeService)
    {
        $this->youtubeService = $youtubeService;
    }
    
    public function getVideoLists() {

        return $this->youtubeService->getVideoLists();
       
    }

    public function getSingleVideo($id) {
      
         return $this->youtubeService->getSingleVideo($id);
    }

    public function getVideoByCategory($categoryId)
    {
       

        return $this->youtubeService->getVideoByCategory($categoryId);

    }
    

}
