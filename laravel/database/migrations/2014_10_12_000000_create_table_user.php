<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableUser extends Migration
{
    /**
     * UP va lancer en premiere instance la creation de la table utilisateurs en initiant le nom le pseudo l'email et le mot de passe 
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();//Creation de la colonne Email en str
            $table->date('email_verified_at');
            $table->string('name');//Creation de la colonne Email en str
            $table->string('username');//Creation de la colonne pseudo en str
            $table->string('password');//Creation de la colonne MDP en str
            $table->timestamps();
            $table->rememberToken();
        });
    }

    /**
     * down inverse la migration et va drop la table
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
