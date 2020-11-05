<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTask extends Migration
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
            $table->string('title');//Creation de la colonne titre en string
            $table->string('description');//Creation de la colonne Description en str
            $table->date("due_date");//Creation de la colonne datepubli en date
            $table->enum('state' , ["todo" , "en-train" , "done"]);//Creation de l'etat en enum
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
