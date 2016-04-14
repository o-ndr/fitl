<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;

use App\Ratings;

use Auth;

class PresentationRatingsController extends Controller
{
    public function __construct()
      {
        $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
      }    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // presentation/{presentation}/ratings OR presentation/<id>/ratings 
    // So adding a variable ($presenttionId) which will rab the presentation ID from the URL
    public function store(Request $request, $presentationId)
    {
        $rating = new Ratings;

        $rating->presentation_id = $presentationId;
        $rating->rating_by_reviewer = $request->rating_by_reviewer;
        $rating->user_id = Auth::user()->id;

        if ( ! $rating->save() ) {
            return redirect()
                ->action('PresentationController@show', $presentationId)
                ->with('errors', $rating->getErrors())
                ->withInput();
        }
            return redirect()
                ->action('PresentationController@show', $presentationId)
                ->with('message',
                    '<div class="alert alert-success">Rating added!</div>');

    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id $presentationId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $presentationId, $id)
    {
        $rating = Ratings::findOrFail($id);

        if ( ! $rating->canEdit() ) {
          abort('403', 'Not authorized.');
        }

        $rating->rating_by_reviewer = $request->rating_by_reviewer;

        if ( ! $rating->save() ) {
            return redirect()
                ->action('PresentationController@show', $presentationId)
                ->with('errors', $rating->getErrors())
                ->withInput();
        }
            // sucess!
            return redirect()
                ->action('PresentationController@show', $presentationId)
                ->with('message',
                    '<div class="alert alert-success">Rating updated!</div>');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id $presentationId
     * @return \Illuminate\Http\Response
     */
    public function destroy($presentationId, $id)
    {
        $rating = Ratings::findOrFail($id);

        if ( ! $rating->canEdit() ) {
          abort('403', 'Not authorized.');
        }

        $rating->delete();

        return redirect()
            ->action('PresentationController@show', $presentationId)
            ->with('message',
                '<div class="alert alert-info">Rating daleted.</div>');
    }
}
