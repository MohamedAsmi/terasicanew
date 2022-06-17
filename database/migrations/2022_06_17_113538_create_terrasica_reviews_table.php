<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTerrasicaReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terrasica_reviews', function (Blueprint $table) {
            $table->id();
            $table->integer('star_count');
            $table->integer('reviewer_id');
            $table->tinyInteger('reviewer_message')->nullable();
            $table->integer('product_id');
            $table->integer('store_id');
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
        Schema::dropIfExists('terrasica_reviews');
    }
}
