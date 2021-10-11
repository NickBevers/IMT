<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    //A collection has 1 owner
    public function user() {
        return $this->belongsTo(\App\models\User:class);
    }

    //A collection has multiple nfts
    public function nfts() {
        return $this->hasMany(\App\Models\Nft::class);
    }
}