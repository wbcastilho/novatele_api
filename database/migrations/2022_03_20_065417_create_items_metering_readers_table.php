<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsMeteringReadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items_metering_readers', function (Blueprint $table) {
            $table->foreignId('item_id');
            $table->foreign('item_id')->references('id')->on('items');
            $table->foreignId('metering_id');
            $table->foreign('metering_id')->references('id')->on('metering_readers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items_metering_readers');
    }
}
