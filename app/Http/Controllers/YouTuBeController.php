<?php

namespace App\Http\Controllers;

use App\Http\Services\YoutubeService;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class YouTubeController extends Controller
{

    protected $youtubeService;

    public function __construct(YoutubeService $youtubeService)
    {
        $this->youtubeService = $youtubeService;
    }

    public function index() {
        $videoLists = $this->youtubeService->getVideoLists();
        return view('index', compact('videoLists'));
    }
    
    public function getVideoLists() {

        return  $this->youtubeService->getVideoLists();
       
    }

    protected function _singleVideo($id)
    {
        return  $this->youtubeService->getSingleVideo($id);
    }

    public function watch($id)
    {
        $singleVideo = $this->_singleVideo($id);
        $videoLists = $this->youtubeService->getVideoLists();
        return view('watch', compact('singleVideo', 'videoLists'));
    }
}