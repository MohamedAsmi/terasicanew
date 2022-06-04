<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmailColumnToEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->string('e_email')->after('e_name');
            $table->string('e_tel')->after('e_email')->nullable();
            $table->string('work_task')->nullable()->change();
            $table->string('n_of_h_week')->nullable()->change();
            $table->string('last_spot')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropColumn('e_email');
            $table->dropColumn('e_tel');
            
        });
    }
}
