<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nft extends Model
{
    use HasFactory;

    //type casting for the json of owners
    protected $casts = [
        'owners' => 'array'
    ];


    //Nft only has 1 collection
    public function collection() {
        return $this->belongsTo(\App\models\Collection::class);
    }

    //Nft has multiple comments
    public function comments() {
        return $this->hasMany(\App\Models\Comment::class);
    }

    //Nft has 1 owner
    public function user() {
        return $this->belongsTo(\App\Models\User::class);
    }

    //a nft has multiple favourites
    public function likes() {
        return $this->hasMany(\App\Models\Favourite::class);
    }
}
