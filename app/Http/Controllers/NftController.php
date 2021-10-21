<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NftController extends Controller
{
    public function showDetail($nft_id) {
        // dd($nft_id);
        $nft = \App\Models\Nft::where('id', $nft_id)->with('user')->first();
        $user = \App\Models\User::where('id', $nft->user_id)->first();
        $data['nft'] = $nft;
        $data['user'] = $user;
        return view('nfts/detail', $data);
    }

    public function searchResults(Request $request){
        $search_query = $request->input()["q"];
        $search_results = \App\Models\Nft::where('title','LIKE',"%{$search_query}%")->get();
        $data['search_results'] = $search_results;
        $data['title'] = "Search for " . $search_query;
        // dd($request);
        return view('search', $data);
    }

    public function edit($nft_id){
        $data['nft'] = \App\Models\Nft::where('id', $nft_id)->first();
        return view('nfts/edit', $data);
    }

    public function update(Request $request){
        $nft =\App\Models\Nft::where('id', $request['id'])->first();
        // dd($collection);
        $nft->title = $request['title'];
        $nft->price = $request['price'];
        $nft->update();
        
        return view('user');
    }

    public function removeFromCollection($nft_id){
        $nft =\App\Models\Nft::where('id', $nft_id)->first();
        $nft->collection_id = 0;
        $nft->update();
        
        return view('user');
    }

    public function addNftToCollection($collection_id, $nft_id){
        $nft =\App\Models\Nft::where('id', $nft_id)->first();
        $nft->collection_id = $collection_id;
        $nft->update();

        return view('user');
    }


    public function destroy($id)
    {
        $collection = \App\Models\Nft::where('id', $id)->first();
        $collection->delete();

        return view('user');
    }
}
