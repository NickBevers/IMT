<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return view('user');
    }

                                    //$username is a variable that comes from the url
    public function showcollection($firstname) {
        $user_id = \DB::table('users')->select('id')->where('first_name', $firstname)->first();

        $user_collection = \App\Models\Nft::where('user_id', $user_id->id)->with('user')->get();
        $data['collection'] = $user_collection;
        return view('collection', $data);
    }
}