<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;

use App\Ratings;


class PresentationRatingsController extends Controller
{
    

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

        $rating->delete();

        return redirect()
            ->action('PresentationController@show', $presentationId)
            ->with('message',
                '<div class="alert alert-info">Rating daleted.</div>');
    }
}
