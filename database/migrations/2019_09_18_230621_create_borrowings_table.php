<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrowings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('replica_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamp('starting_at');
            $table->timestamp('started_at')->nullable();
            $table->timestamp('finishing_at')->nullable();
            $table->timestamp('finished_at')->nullable();
            $table->timestamp('validated_at')->nullable();
            $table->timestamp('cancelled_at')->nullable();
            $table->timestamps();

            $table->foreign('replica_id')->references('id')->on('replicas')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrowings');
    }
}
