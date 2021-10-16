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

        //Old code from Bailey ↓
        $user_id = \App\Models\User::where('first_name', $firstname)->first();
        $user_collection = \App\Models\Nft::where('user_id', $user_id->id)->with('user')->get();
        $data['collection'] = $user_collection;
        return view('collections/collection', $data);
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
    }
}
