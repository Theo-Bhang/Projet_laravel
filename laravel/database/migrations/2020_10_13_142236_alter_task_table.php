<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('task', function (Blueprint $table) {
            $table->string('title');//Creation de la colonne titre en string
            $table->string('description');//Creation de la colonne Description en str
            $table->date("due_date");//Creation de la colonne datepubli en date
            $table->enum('state' , ["todo" , "ongoing" , "done"]);//Creation de l'etat en enum

            //$table->unsignedBigInteger('user_id');
            //$table->foreign("user_id")->references('id')->on("utilisateurs");
            $table->foreignId("user_id")->constrained("user");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('task', function (Blueprint $table) {
            $table->dropForeign("task_user_id_foreign");
            $table->dropColumns("user_id", "title", "description","state");
        });
    }
}
