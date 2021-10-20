<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public $random_numbers = [];

    public function index() {
        $most_expensive = \App\Models\Nft::orderBy('price', 'DESC')->first();
        $recents = \App\Models\Nft::orderBy('created_at', 'DESC')->take(5)->get();
        $data['most_expensive'] = $most_expensive;
        $data['recents'] = $recents;
        $data['title'] = "Home";
        return view('index', $data);
    }

    /*public function create_random_array($number_of_gens){
        for($i=0;$i<$number_of_gens;$i++){
            $this->generate_random($this->random_numbers);
        }
        return $this->random_numbers;
    }

    public function check_if_in_array($number, $random_numbers){
        if(in_array($number, $random_numbers)){
            return true;
        } else {
            return false;
        }
    }

    public function generate_random($random_numbers){
        $max_id = \App\Models\Nft::max("id");
        $number = rand(1,$max_id);
        if($this->check_if_in_array($number, $random_numbers)){
            $this->generate_random($this->random_numbers);
        } else {
            array_push($this->random_numbers, $number);
        }
        return $random_numbers;
    }*/

    public function discover(){
        /*$this->random_numbers = [];
        $array = $this->create_random_array(10);
        $nfts = \App\Models\Nft::get();*/
        $nfts = \App\Models\Nft::inRandomOrder()->take(10)->get();
        $data['nfts'] = $nfts;
        // $data['randoms'] = $array;
        $data['title'] = "Discover";
        // dd($nfts);
        return view('discover', $data);
    }
}
