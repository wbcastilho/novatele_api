<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeateringreadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meteringreaders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('min_param', 6, 2)->nullable();
            $table->float('max_param', 6, 2)->nullable();
            $table->string('unity', 10)->nullable();
            $table->foreignId('parent_id');
            $table->foreign('parent_id')->references('id')->on('containers');          
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meteringreaders');
    }
}
