<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAttachment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attachments', function (Blueprint $table) {
            $table->id();
            $table->string('file');//Creation de la colonne fichier en str
            $table->string('filename');//Creation de la colonne nom du fichier en str
            $table->bigInteger('size');//Creation de la colonne size du fichier en float
            $table->string('type');
            $table->date('created_at');
            $table->date('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attachments');
    }
}
