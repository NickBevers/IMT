<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index() {
        $most_expensive = \App\Models\Nft::orderBy('price', 'DESC')->first();
        $recents = \App\Models\Nft::orderBy('created_at', 'DESC')->take(5)->get();
        $data['most_expensive'] = $most_expensive;
        $data['recents'] = $recents;
        $data['title'] = "Home";
        return view('index', $data);
    }

    public function discover(){
        $nfts = \App\Models\Nft::inRandomOrder()->take(10)->get();
        $data['nfts'] = $nfts;
        $data['title'] = "Discover";
        return view('discover', $data);
    }
}
