<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomSymbolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_symbols', function (Blueprint $table) {
            $table->id();
            $table->text('text');
            $table->float('x');
            $table->float('y');
            $table->unsignedBigInteger('id_room');
            $table->foreign('id_room')->references('id')->on('rooms')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('id_symbol');
            $table->foreign('id_symbol')->references('id')->on('symbols')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('room_symbols');
    }
}
