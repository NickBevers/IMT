<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nfts', function (Blueprint $table) {
            $table->id();
            $table->String('title')->unique();
            $table->foreignId('user_id');
            $table->float('price', 16, 6);
            $table->String('owner_address')->default("");
            $table->String('token_id')->default("");
            $table->String('media_url')->default("URL");
            $table->foreignId('collection_id')->default(0);
            $table->boolean('minted')->default(false);
            $table->String('creator')->default("Nick Bevers");
            $table->json('owners');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nfts');
    }
}
