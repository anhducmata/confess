<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFolowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('folows', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('requester_id');
            $table->integer('folower_id');
/*            $table->foreign('requester_id')->references('id')->on('users');
            $table->foreign('folower_id')->references('id')->on('users');   */         
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
        Schema::dropIfExists('folows');
    }
}
