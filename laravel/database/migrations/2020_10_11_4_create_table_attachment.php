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
            $table->longText('file');//Creation de la colonne fichier en str
            $table->string('filename');//Creation de la colonne nom du fichier en str
            $table->bigInteger('size');//Creation de la colonne size du fichier en float
            $table->string('type');
            $table->foreignId("user_id")->nullable()->constrained()->setNullOnDelete();
            $table->foreignId("task_id")->constrained()->onDelete("cascade");
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
        Schema::dropIfExists('attachments');
    }
}
