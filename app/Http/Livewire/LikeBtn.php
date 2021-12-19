<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Redirector;

class LikeBtn extends Component
{

    public function like($nft) {
        $user = Auth::user();

        $like = new \App\Models\Favourite();
        $like->user_id = $user->id;
        $like->nft_id = $nft;
        $like->save();

        //fill heart
    }

    public function render()
    {
        return view('livewire.like-btn', [
            'nfts' => \App\Models\Nft::inRandomOrder()->take(20)->get(),
        ]);
    }
    
}
