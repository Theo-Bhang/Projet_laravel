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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->date('due_date');
            $table->enum('state' , ["todo" , "ongoing" , "done"])->default("todo");//Creation de l'etat en enum
            $table->foreignId('category_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('board_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('tasks');
    }
}
