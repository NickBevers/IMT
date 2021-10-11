<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->String('title');
            $table->String('content');
            //$table->bigInteger('nfts_id')->unsigned()->index();
            //$table->foreign('nfts_id')->references('id')->on('nfts');
            //$table->bigInteger('author_id')->unsigned()->index();
            //$table->foreign('author_id')->references('id')->on('users');
            $table->foreignId('user_id');
            $table->foreignId('nft_id');
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
        Schema::dropIfExists('comments');
    }
}
