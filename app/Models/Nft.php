<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nft extends Model
{
    use HasFactory;

    //Nft only has 1 collection
    public function collection() {
        return $this->belongsTo(\App\models\Collection:class);
    }

    //Nft has multiple comments
    public function comments() {
        return $this->hasMany(\App\Models\Comment::class);
    }
}
