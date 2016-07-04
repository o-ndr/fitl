<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Track;

class TrackController extends Controller
{

/**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $track = Track::findOrFail($id);
        return view('tracks.show', 
            ['track' => $track, 'tracks' => Track::all() ]);
    }
}