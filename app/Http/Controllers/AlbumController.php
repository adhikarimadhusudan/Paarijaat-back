<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Album;
use App\Models\Episode;
use Illuminate\Support\Facades\Auth;


class AlbumController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::orderBy('id','desc')->with('user')->get();
        return $albums;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $file_name = '';
        if($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $file_name = time(). '.' . $file->getClientOriginalName();
            $file->move(public_path('albums/images'), $file_name);
        } 
        $title = $request->title;
        $description = $request->description;

        $album = new Album;
        $album->title = $title;
        $album->description = $description;
        $album->thumbnail = $file_name;
        $album->user_id = Auth::user()->id;
        $album->save();
        return $album;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function read($id)
    {
        $episodes = Episode::where('album_id' , $id)->with('user')->get();
        $album = Album::find($id);
        return response()->json(['episodes' => $episodes, 'album' => $album]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $album = Album::find($id);
        return $album;
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
        $album = Album::find($id);
        $title = $request->title;
        $description = $request->description;
        $album->title = $title;
        $album->description = $description;
        if($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $file_name = time(). '.' . $file->getClientOriginalName();
            $file->move(public_path('albums/images'), $file_name);
            $album->thumbnail = $file_name;
        } 
        $album->save();
        return $album;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
    }
}
