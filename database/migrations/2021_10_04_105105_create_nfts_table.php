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
            $table->String('title');
            $table->foreignId('user_id');
            $table->Integer('price');
            $table->String('blockchain');
            $table->String('media_url');
            //$table->bigInteger('collection_id')->unsigned()->index();
            //$table->foreign('collection_id')->references('id')->on('collections');
            $table->foreignId('collection_id');
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
