<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Type;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                return view('admin.types.index', ['types' => Type::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.types.create', [ 'type' => new Type ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $type = new Type;
        $type->type = $request->type;

        if ( ! $type->save() ) {
        	// redirect back to create and show errors
        	return redirect()
        		->route('admin.types.create')
        		->with('errors', $type->getErrors())
        		->withInput();
        }

        // sucess!
        // redirect to index, with success message
        return redirect()
        	->route('admin.types.index')
        	->with('message',
        		'<div class="alert alert-success">Your new presentation type was created!</div>');
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = Type::findOrFail($id);

        return view('admin.types.edit', [ 'type' => $type ]);

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
        $type = Type::findOrFail($id);
        $type->type = $request->type;

        if ( ! $type->save() ) {
        	// redirect back to edit and show errors
        	return redirect()
        		->route('admin.types.edit', $type->id)
        		->with('errors', $type->getErrors())
        		->withInput();
        }

        // sucess!
        // redirect to index, with success message
        return redirect()
        	->route('admin.types.index')
        	->with('message',
        		'<div class="alert alert-success">Your presentation type has been updated!</div>');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = Type::findOrFail($id);

        $type->delete();

        return redirect()
            ->route('admin.types.index')
            ->with('message',
                '<div class="alert alert-info">The presetation type was deleted.</div>');
    }
}
