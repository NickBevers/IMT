<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CollectionController extends Controller
{
    //
    // Display the collections
    public function show($user_id)
    {
        //$username is a variable that comes from the url
        $user = \App\Models\User::where('id', $user_id)->first();
        $user_collection = \App\Models\Collection::where('user_id', $user->id)->with('user')->get();
        $data['collections'] = $user_collection;
        $data['title'] = "Collection";
        return view('collections/collection', $data);
    }

    // Show the detail page of a collection with the nft's in it
    public function showDetail($collection_id) {
        $collection = \App\Models\Collection::where('id', $collection_id)->with('nfts')->first();
        $nfts = \App\Models\Nft::where('collection_id', $collection_id)->get();
        $data['collection'] = $collection;
        $data['nfts'] = $nfts;
        return view('collections/detail', $data);
    }

    // Show a form for creation of a new collection
    public function create()
    {        
        return view('collections/create');
    }

    // Store the new collection in a database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:App\Models\Collection,title',
            'description' => 'required',
        ]);

        $user = Auth::user();
        $collection = new \App\Models\Collection();
        $collection->title = $request['title'];
        $collection->description = $request['description'];
        $collection->user_id=$user->id;
        $collection->save();
        
        return redirect()->action([CollectionController::class, 'show'], ['user_id' => $user->id]);
    }

    public function addNft($collection_id){
        //return view with all nft's of user
        $user = Auth::user();
        $data['nfts'] = \App\Models\Nft::where('user_id', $user->id)->get();
        $data['collection'] = \App\Models\Collection::where('id', $collection_id)->first();
        return view('nfts/addToCollection', $data);
    }

    public function edit($collection_id){
        $data['collection'] = \App\Models\Collection::where('id', $collection_id)->first();
        return view('collections/edit', $data);
    }

    public function update(Request $request){
        $collection =\App\Models\Collection::where('id', $request['old_value'])->first();
        // dd($collection);
        $collection->title = $request['title'];
        $collection->description = $request['description'];
        $collection->update();
        
        $user =Auth::user();
        // return view('collections/collection');
        return redirect()->action([CollectionController::class, 'showDetail'], ['collection_id' => $collection->id]);
    }

    public function destroy($id)
    {
        //
        $collection = \App\Models\Collection::where('id', $id)->first();
        $collection->delete();

        $user =Auth::user();
        return redirect()->action([CollectionController::class, 'show'], ['firstname' => $user->firstname]);
    }
}
