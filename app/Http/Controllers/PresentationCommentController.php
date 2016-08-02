<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;

use App\Comment;

use Auth;

class PresentationCommentController extends Controller
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

    # The $presentationId variable is added in order for the following to work:
    #  presentations/{id}/comments -- it will automatically grab the presentation 
    # from the url

    # So, it (the "store" action) is now set up to retrieve the form data and accept the presentation id
    public function store(Request $request, $presentationId)
    {
        
        # create the object,
        # set its data,
        # attempt to save it,
        # retrieve errors if there were any & redirect to show errors,
        # otherwise redirect to show the success message. 


        // start by cretaing a new Comment object
        $comment = new Comment;

        // set its data
        // Note that we set its presentation_id equal to
        // the $presentaitonId we retrieved from the url.
        // Then we set the comment_by_reviewer equal to the $request (which is the form data).
        // "$request->comment" means the request's comment, i.e. whatever the user
        // filled out in the comment form 
        $comment->presentation_id = $presentationId;
        $comment->comment_by_reviewer = $request->comment_by_reviewer;
        # above - comment_by_reveiwer is the column name, and comment is
        # probably from here, the form data -- {!! Form::textarea('comment'...

        // Attempt to save the comment.
        // Check if it worked properly.
        // If not properly, redirect to the action for PresentationController@show
        // i.e. the show presentation page. And pass along the $presentationId (coz it needs that for the url),
        // pass along the errors -- btw we retrieve those using the getErrors function -- 
        // and pass along the input
        if ( ! $comment->save() ) {
            return redirect()
                ->action('PresentationController@show', $presentationId)
                ->with('errors', $comment->getErrors())
                ->withInput();
        }

        // success! redirect to the show page with the success mesasge. 
        return redirect()
            ->action('PresentationController@show', $presentationId)
            ->with('message', 
                '<div class="alert alert-success">Comment added!</div>');

    }
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @param  int  $presentationId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $presentationId, $id)
    {
        $comment = Comment::findOrFail($id);

        $comment->comment_by_reviewer = $request->comment_by_reviewer;

        if ( ! $comment->save() ) {
            return redirect()
                ->action('PresentationController@show', $presentationId)
                ->with('errors', $comment->getErrors())
                ->withInput();
        }

        // success! redirect to the show page with the success mesasge. 
        return redirect()
            ->action('PresentationController@show', $presentationId)
            ->with('message', 
                '<div class="alert alert-success">Comment updated!</div>');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  int  $presentationId
     * @return \Illuminate\Http\Response
     */
    public function destroy($presentationId, $id)
    {
        $comment = Comment::findOrFail($id);

        if ( ! $rating->canEdit() ) {
          abort('403', 'Not authorized.');
        }

        $comment->delete();

        return redirect()
        ->action('PresentationController@show', $presentationId)
        ->with('message',
            '<div class="alert alert-info">Comment deleted.</div>');
    }
}
