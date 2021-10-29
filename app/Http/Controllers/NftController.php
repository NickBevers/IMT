<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Redirector;

class NftController extends Controller
{
    public function show() {
        $user = Auth::user();
        $data['user'] = $user->first_name . " " . $user->last_name;
        $data['nfts'] = \App\Models\Nft::where('user_id', $user->id)->get();
        return view('wallet/index', $data);
    }

    public function showDetail($nft_id) {
        // dd($nft_id);
        $nft = \App\Models\Nft::where('id', $nft_id)->with('user')->first();
        $user = Auth::user();
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

    public function create()
    {
        $data['collections'] = \App\Models\Collection::all();
        return view('nfts/add', $data);
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'title' => 'required|unique:App\Models\Nft,title',
        //     'description' => 'required',
        // ]);

        $user = Auth::user();

        $nft = new \App\Models\Nft();
        $nft->title = $request['title'];
        $nft->user_id = $user->id;
        $nft->price = $request['price'];
        $nft->collection_id = $request['collection'];
        if ($request['for_sale']) {
            $nft->for_sale = 1;
        }
        
        $nft->owners = array($user->wallet);
        $nft->save();
        
        return redirect()->action([NftController::class, 'show']);
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
        // dd($request);
        if ($request['for_sale']) {
            $nft->for_sale = 1;
        }
        $nft->update();
        
        return view('profile/user');
    }

    public function buy($nft_id)
    {
        $user = Auth::user();
        $user_wallet = $user->wallet;
        $nft = \App\Models\Nft::where('id', $nft_id)->first();
        $nft->user_id = $user->id;
        $ownerArray = $nft->owners;
        // dd($nft->owners);
        if (in_array($user->wallet, $ownerArray)){
            $lastKey = key(array_slice($ownerArray, -1, 1, true));
            if((string) $lastKey != $user_wallet){
                array_push($ownerArray, $user_wallet);
                $nft->owners = $ownerArray;
                $nft->update();
            }
            else{
                //return the user to the detail view with data nft and user
                return view('nfts/detail', ['nft' => $nft, 'user' => $user]);
            }
        }
        else{
            array_push($ownerArray, $user_wallet);
            $nft->owners = $ownerArray;
            $nft->update();
        }
        $nft->update();

        

        return view('profile/user');
    }

    public function removeFromCollection($nft_id){
        $user = Auth::user();
        $nft = \App\Models\Nft::where('id', $nft_id)->first();
        $nft->collection_id = 0;
        $nft->update();
        
        return redirect()->action([CollectionController::class, 'show'], ['username' => $user->first_name]);
    }

    public function addNftToCollection($collection_id, $nft_id){
        $user = Auth::user();
        $nft =\App\Models\Nft::where('id', $nft_id)->first();
        $nft->collection_id = $collection_id;
        $nft->update();

        return redirect()->action([CollectionController::class, 'show'], ['username' => $user->first_name]);
    }


    public function destroy($id)
    {
        $collection = \App\Models\Nft::where('id', $id)->first();
        $collection->delete();

        return view('profile/user');
    }
}
