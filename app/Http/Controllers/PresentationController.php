<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;

use App\Presentation;

class PresentationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $presentations = Presentation::all();

        $data = array();
        $data['objects'] = $presentations;

        return view('presentations.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $presentation = new Presentation;
        $data = array();
        $data['presentation'] = $presentation;
        return view('presentations.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $presentation = new Presentation;

       // set the presentation's data from the form data
       $presentation->presentation_title = $request->presentation_title;
       $presentation->synopsis = $request->synopsis;
       $presentation->conference_track = $request->conference_track;

       // create the new presentation in the database
       if (!$presentation->save()) {
            $errors = $presentation->getErrors();
           
           // redirect back to the create page 
            // and pass along the errors
            return redirect()
            ->action('PresentationController@create')
            ->with('errors', $errors)
            ->withInput();
       }

       // success!
       return redirect()
       ->action('PresentationController@index')
       ->with('message',
        '<div class="alert alert-success">Submission created successfully!</div>');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$data = array();

        $presentation = Presentation::findOrFail($id);
        $data['object'] = $presentation;

    	return view('presentations/show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $presentation = Presentation::findOrFail($id);
        return view('presentations.edit', ['presentation' => $presentation]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $presentation = Presentation::findOrFail($id);

        // set the presentation's data from the form data
       $presentation->presentation_title = $request->presentation_title;
       $presentation->synopsis = $request->synopsis;
       $presentation->conference_track = $request->conference_track;

       // if the save fails,
       // redirect back to the edit page
       // and show the errors
       if (!$presentation->save()) {
            return redirect()
            ->action('PresentationController@edit', $presentation->id)
            ->with('errors', $presentation->getErrors())
            ->withInput();
       }

       // success!
       // redirect to index and pass a success message
       return redirect()
       ->action('PresentationController@index')
       ->with('message',
            '<div class="alert alert-success">The presentation was updated!</div>');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $presentation = Presentation::findOrFail($id);

        $presentation->delete();

        return redirect()
          ->action('PresentationController@index')
          ->with('message',
              '<div class="alert alert-info">The presentation was deleted.</div>');
    }
}
