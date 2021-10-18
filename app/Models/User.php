<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    //A user has multiple collections
    public function collections() {
        return $this->hasMany(\App\Models\Collection::class);
    }

     //A user has multiple comments
     public function comments() {
        return $this->hasMany(\App\Models\Comment::class);
    }

    //a user has multiple nfts
    public function nfts() {
        return $this->hasMany(\App\Models\Nft::class);
    }
}
