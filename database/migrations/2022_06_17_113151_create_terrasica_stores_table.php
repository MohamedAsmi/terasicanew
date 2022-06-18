<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTerrasicaStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terrasica_stores', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('store_status');
            $table->tinyInteger('status');
            $table->string('store_name');
            $table->string('store_description')->nullable();
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
        Schema::dropIfExists('terrasica_stores');
    }
}
