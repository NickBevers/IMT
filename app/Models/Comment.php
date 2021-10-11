<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    //A comment has 1 owner
    public function user() {
        return $this->belongsTo(\App\models\User::class);
    }

    //A collection has 1 nft
    public function nft() {
        return $this->belongsTo(\App\models\Nft::class);
    }
}
