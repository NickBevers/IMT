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
            $table->Integer('price');
            $table->String('owner_address')->default("");
            $table->String('nft_hash')->default("");
            $table->String('media_url')->default("http://WE_NEED_TO_CHANGE_THIS_TO_A_URL");
            $table->foreignId('collection_id')->default(0);
            $table->boolean('for_sale')->default(0);
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
