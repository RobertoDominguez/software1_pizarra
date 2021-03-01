<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArrowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arrows', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_parent');
            $table->foreign('id_parent')->references('id')->on('room_symbols')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('id_child');
            $table->foreign('id_child')->references('id')->on('room_symbols')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('position_parent');
            $table->integer('position_child');
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
        Schema::dropIfExists('arrows');
    }
}
