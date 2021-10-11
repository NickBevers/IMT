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
}
