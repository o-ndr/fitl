<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

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
        return view('tracks.index', ['tracks' => Track::all()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tracks.create', [ 'track' => new Track ]);
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
        $track->track = $request->track;

        if ( ! $track->save() ) {
            // redirect back to the create and show pages
            return redirect()
            ->route('tracks.create')
            ->with('errors', $track->getErrors())
            ->withInput();

        }

        // Success!
        // redirect to index, with success message
        return redirect()
        ->route('tracks.index')
        ->with('message',
            '<div class="alert alert-success">You track was created!</div>');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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

        return view('tracks.edit', [ 'track' => $track ]);
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
        $track->track = $request->track;

        if ( ! $track->save() ) {
            // redirect back to the create and show pages
            return redirect()
            ->route('tracks.edit', $track->id)
            ->with('errors', $track->getErrors())
            ->withInput();

        }

        // Success!
        // redirect to index, with success message
        return redirect()
        ->route('tracks.index')
        ->with('message',
            '<div class="alert alert-success">You track has been updated!</div>');
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
