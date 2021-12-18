<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class AppController extends Controller
{
    public function index() {
        $most_expensive = \App\Models\Nft::orderBy('price', 'DESC')->first();
        $recents = \App\Models\Nft::orderBy('created_at', 'DESC')->take(7)->get();
        $data['most_expensive'] = $most_expensive;
        $data['recents'] = $recents;
        $data['title'] = "Home";
        return view('index', $data);
    }

    public function discover(Request $request){
        if(isset($request->input()["time_posted"])){
            //Which input we check doesn't matter, because they will all have a value when submitted
            $currentDateTime = Carbon::now();
            if($request->input()["time_posted"] == "all"){
                $nfts = \App\Models\Nft::inRandomOrder()
                ->where([
                    ['price', '>=', (int)$request->input()["min_price"]],
                    ['price', '<=', (int)$request->input()["max_price"]],
                ])
                ->get();
            } else {
                $nfts = \App\Models\Nft::inRandomOrder()
                ->where([
                    ['price', '>=', (int)$request->input()["min_price"]],
                    ['price', '<=', (int)$request->input()["max_price"]],
                    ['created_at', '>=', $currentDateTime->subDays($request->input()["time_posted"])],
                    // >= created_at has to be newer than $currentDateTime
                    // <= created_at has to be older than $currentDateTime
                ])
                ->get();
            }
        } else {
            $nfts = \App\Models\Nft::inRandomOrder()->take(10)->get();
        }
        $data['nfts'] = $nfts;
        $data['title'] = "Discover";
        //We can get the actual data from the filters using $request (see dd below) and by adding "where" to our query
        // dd($request->input());
        return view('discover', $data);
    }
}
