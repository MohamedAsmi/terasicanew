<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTeamMembersColumnToTeamChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('team_chats', function (Blueprint $table) {
            $table->string('team_members19')->nullable()->after('team_members0');
            $table->string('team_members18')->nullable()->after('team_members0');
            $table->string('team_members17')->nullable()->after('team_members0');
            $table->string('team_members16')->nullable()->after('team_members0');
            $table->string('team_members15')->nullable()->after('team_members0');
            $table->string('team_members14')->nullable()->after('team_members0');
            $table->string('team_members13')->nullable()->after('team_members0');
            $table->string('team_members12')->nullable()->after('team_members0');
            $table->string('team_members11')->nullable()->after('team_members0');
            $table->string('team_members10')->nullable()->after('team_members0');
            $table->string('team_members9')->nullable()->after('team_members0');
            $table->string('team_members8')->nullable()->after('team_members0');
            $table->string('team_members7')->nullable()->after('team_members0');
            $table->string('team_members6')->nullable()->after('team_members0');
            $table->string('team_members5')->nullable()->after('team_members0');
            $table->string('team_members4')->nullable()->after('team_members0');
            $table->string('team_members3')->nullable()->after('team_members0');
            $table->string('team_members2')->nullable()->after('team_members0');
            $table->string('team_members1')->nullable()->after('team_members0');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('team_chats', function (Blueprint $table) {
            // $table->dropColumn('team_members0');
            $table->dropColumn('team_members1');
            $table->dropColumn('team_members2');
            $table->dropColumn('team_members3');
            $table->dropColumn('team_members4');
            $table->dropColumn('team_members5');
            $table->dropColumn('team_members6');
            $table->dropColumn('team_members7');
            $table->dropColumn('team_members8');
            $table->dropColumn('team_members9');
            $table->dropColumn('team_members10');
            $table->dropColumn('team_members11');
            $table->dropColumn('team_members12');
            $table->dropColumn('team_members13');
            $table->dropColumn('team_members14');
            $table->dropColumn('team_members15');
            $table->dropColumn('team_members16');
            $table->dropColumn('team_members17');
            $table->dropColumn('team_members18');
            $table->dropColumn('team_members19');
        });
    }
}
