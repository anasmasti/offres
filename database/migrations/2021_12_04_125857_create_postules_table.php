<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postules', function (Blueprint $table) {
            $table->id()->increments();;
            $table->unsignedBigInteger('idemp');
            $table->unsignedBigInteger('idoffre');
            $table->date('date');
            $table->foreign('idemp')->references('id')->on('users');
            $table->foreign('idoffre')->references('id')->on('offres');
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
        Schema::dropIfExists('postules');
    }
}
