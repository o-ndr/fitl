<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Track;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tracks.index', ['tracks' => Track::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tracks.create', [ 'track' => new Track ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $track = new Track;
        $track->track_name = $request->track_name;

        if ( ! $track->save() ) {
            // redirect back to create and show errors
            return redirect()
                ->route('admin.tracks.create')
                ->with('errors', $track->getErrors())
                ->withInput();
        }

        // sucess!
        // redirect to index, with success message
        return redirect()
            ->route('admin.tracks.index')
            ->with('message',
                '<div class="alert alert-success">Your new presentation track was created!</div>');
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $track = Track::findOrFail($id);

        return view('admin.tracks.edit', [ 'track' => $track ]);
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
        $track = Track::findOrFail($id);
        $track->track_name = $request->track_name;

        if ( ! $track->save() ) {
            // redirect back to edit and show errors
            return redirect()
                ->route('admin.tracks.edit', $track->id)
                ->with('errors', $track->getErrors())
                ->withInput();
        }

        // sucess!
        // redirect to index, with success message
        return redirect()
            ->route('admin.tracks.index')
            ->with('message',
                '<div class="alert alert-success">Your presentation track has been updated!</div>');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $track = Track::findOrFail($id);

        $track->delete();

        return redirect()
            ->route('admin.tracks.index')
            ->with('message',
                '<div class="alert alert-info">The presetation track was deleted.</div>');
    }
}
