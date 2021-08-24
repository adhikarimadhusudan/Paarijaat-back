<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Episode;
use Illuminate\Support\Facades\Auth;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $thumbnail = '';
        if($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $thumbnail = time(). '.' . $file->getClientOriginalName();
            $file->move(public_path('episodes/images'), $thumbnail);
        }
        $audio = '';
        if($request->hasFile('audio')) {
            $file = $request->file('audio');
            $audio = time(). '.' . $file->getClientOriginalName();
            $file->move(public_path('episodes/audios'), $audio);
        }
        $title = $request->title;
        $description = $request->description;
        $episode = new Episode;
        $episode->title = $title;
        $episode->description = $description;
        $episode->thumbnail = $thumbnail;
        $episode->audio = $audio;
        $episode->user_id = Auth::user()->id;
        $episode->album_id = $request->album_id;
        $episode->save();
        return $episode;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function read($id)
    {
        $episode = Episode::find($id);
        return $episode;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $episode = Episode::find($id);

        $title = $request->title;
        $description = $request->description;
        $episode->title = $title;
        $episode->description = $description;
        if($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $thumbnail = time(). '.' . $file->getClientOriginalName();
            $file->move(public_path('episodes/images'), $thumbnail);
            $episode->thumbnail = $thumbnail;
        }
        if($request->hasFile('audio')) {
            $file = $request->file('audio');
            $audio = time(). '.' . $file->getClientOriginalName();
            $file->move(public_path('episodes/audios'), $audio);
            $episode->audio = $audio;
        }
        $episode->user_id = Auth::user()->id;
        $episode->save();
        return $episode;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
