<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreationTableTache extends Migration
{
    /**
     * 
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task', function (Blueprint $table) {
            $table->id();
            $table->string('titre');//Creation de la colonne titre en string
            $table->string('description');//Creation de la colonne Description en str
            $table->date("date_de_publication");//Creation de la colonne datepubli en date
            $table->enum('etat' , ["a_faire" , "en-train" , "fait"]);//Creation de l'etat en enum
            $table->timestamps();
        });
    }

    /**
     * 
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task');
    }
}
