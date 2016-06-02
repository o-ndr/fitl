<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;

use App\Presentation;
use App\Type;
use App\Track;

use Auth;

class PresentationController extends Controller
{
      public function __construct()
      {
        $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
      }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $presentations = Presentation::all();

        $data = array();
        $data['presentations'] = $presentations;
        $data['types'] = Type::all();

        return view('presentations.index', $data);

    }


    public function search(Request $request)
    {
      // retrieve query from URL
      $q = $request->q;

      // SQL LIKE format for matching on search query:
      // %SEARCH_TERM%
      $q_query = '%' . $q . '%';
      $presentations = Presentation::where('presentation_title', 'LIKE', $q_query)
                                      ->orWhere('synopsis', 'LIKE', $q_query)
                                      ->orWhere('conference_track', 'LIKE', $q_query)
                                      ->get();

      return view('presentations.search', 
        ['q' => $q, 'presentations' => $presentations, 'types' => Type::all()]);
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
        // <select><option="VALUE">TEXT</option></select>
        // [ VALUE => TEXT, VALUE => TEXT ]
        // <option value="1">Case study</option>
        // <option value="2">Panel discussion</option>
       
        $types = Type::lists('type', 'id');
        // return view('presentations.edit', ['presentation' => $presentation]);

        $tracks = Track::lists('track_name', 'id');

        return view('presentations.create', ['presentation' => $presentation, 'tracks' => $tracks, 'types' => $types]);
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
       $presentation->user_id = Auth::user()->id;
       

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

       // establish types relationships
       $presentation->types()->sync($request->type_id);

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


        if ( ! $presentation->canEdit() ) {
          abort('403', 'Not authorized.');
        }

        $types = Type::lists('type', 'id');
        // return view('presentations.edit', ['presentation' => $presentation]);

        $tracks = Track::lists('track_name', 'id');
        return view('presentations.edit', ['presentation' => $presentation, 'tracks' => $tracks, 'types' => $types]);
        # Mythu solved this, and taught me to use the hash, too 
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

        if ( ! $presentation->canEdit() ) {
          abort('403', 'Not authorized.');
        }

        // set the presentation's data from the form data
       $presentation->presentation_title = $request->presentation_title;
       $presentation->synopsis = $request->synopsis;
       $presentation->conference_track = $request->conference_track;
       $presentation->types()->sync($request->type_id);

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

        if ( ! $presentation->canEdit() ) {
          abort('403', 'Not authorized.');
        }

        $presentation->delete();

        return redirect()
          ->action('PresentationController@index')
          ->with('message',
              '<div class="alert alert-info">The presentation was deleted.</div>');
    }
}
