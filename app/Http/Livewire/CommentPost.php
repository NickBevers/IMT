<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CommentPost extends Component
{
    public $comments;

    public function post(){
        $this->comments = DB::table('comments')
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->select("comments.user_id", "comments.content", "users.first_name")
            ->where('nft_id', $nft_id)
            ->get();
    }

    public function render()
    {
        return view('livewire.comment-post');
    }
}
