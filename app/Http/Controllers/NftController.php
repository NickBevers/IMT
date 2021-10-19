<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NftController extends Controller
{
    public function showDetail($nft_name) {
        $nft_info = \App\Models\Nft::where('title', $nft_name)->with('user')->first();
        $data['nft'] = $nft_info;
        return view('detail', $data);
    }

    public function searchResults(Request $request){

        $search_query = $request->input()["q"];
        $search_results = \App\Models\Nft::where('title','LIKE',"%{$search_query}%")->get();
        $data['search_results'] = $search_results;
        return view('search', $data);
    }
}
