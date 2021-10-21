<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CollectionController extends Controller
{
    //
    // Display the collections
    public function show($firstname)
    {
        //$username is a variable that comes from the url
        $user_id = \App\Models\User::where('first_name', $firstname)->first();
        $user_collection = \App\Models\Collection::where('user_id', $user_id->id)->with('user')->get();
        $data['collection'] = $user_collection;
        $data['title'] = "Collection";
        return view('collections/collection', $data);
    }

    // Show the detail page of a collection with the nft's in it
    public function showDetail($collection_name) {
        $data['collection'] = \App\Models\Collection::where('title', $collection_name)->first();
        return view('collections/detail', $data);
    }

    // Show a form for cretion of a new collection
    public function create()
    {        
        return view('collections/create');
    }

    // Store the new collection in a database
    public function store(Request $request)
    {
        //
        $collection = new \App\Models\Artist();
        $collection->title = $request->input('title');
        $collection->description = $request->input('description');
        $collection->save();

        $request->flash();
        $request->session()->flash('message', 'Successfully created a collection🎉');
        
        return redirect('login');
    }

    public function edit($collection_title){
        $data['collection'] = \App\Models\Collection::where('title', $collection_title)->first();
        return view('collections/edit', $data);
    }

    public function update(Request $request){
        $collection =\App\Models\Collection::where('id', $request['old_value'])->first();
        // dd($request['old_value']);
        $collection->title = $request['title'];
        $collection->description = $request['description'];
        $collection->update();
        
        // $user_id = \App\Models\User::where('first_name', $firstname)->first();
        // $user_collection = \App\Models\Collection::where('user_id', $user_id->id)->with('user')->get();
        // $data['collection'] = $user_collection;

        return view('collections/collection');
    }
}
