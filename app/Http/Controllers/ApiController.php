<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Album;
use App\Models\Episode;



class ApiController extends Controller
{
    public function getAlbums () {
        $albums = Album::orderBy('id','desc')->with('user')->get();
        return $albums;
    }

    public function showAlbum($id) {
        $albums = Album::with('user','episodes')->find($id);
        return $albums;
    }

    public function getEpisodes () {
        $episodes = Episode::orderBy('id', 'desc')->with('user')->limit(5)->get();
        return $episodes;
    }
    
    public function getRandomAlbums () {
        $episodes = Album::with('user')->inRandomOrder()->limit(5)->get();
        return $episodes;
    }
    
    
    public function showEpisode ($id) {
        $episode = Episode::find($id);
        $album = $episode->album()->with('episodes')->get();
        return response()->json(['episode' => $episode, 'album' => $album]);
    } 
}
