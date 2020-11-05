<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('taches', function (Blueprint $table) {
            $table->string('titre');//Creation de la colonne titre en string
            $table->string('description');//Creation de la colonne Description en str
            $table->date("date_de_publication");//Creation de la colonne datepubli en date
            $table->enum('etat' , ["a_faire" , "en-train" , "fait"]);//Creation de l'etat en enum

            //$table->unsignedBigInteger('user_id');
            //$table->foreign("user_id")->references('id')->on("utilisateurs");
            $table->foreignId("user_id")->constrained("utilisateurs");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('taches', function (Blueprint $table) {
            $table->dropForeign("taches_user_id_foreign");
            $table->dropColumns("user_id", "title", "description","state");
        });
    }
}
