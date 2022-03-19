<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldsetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fieldsets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('dashboard_id');
            $table->foreign('dashboard_id')->references('id')->on('dashboards');  
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
        Schema::dropIfExists('fieldsets');
    }
}
