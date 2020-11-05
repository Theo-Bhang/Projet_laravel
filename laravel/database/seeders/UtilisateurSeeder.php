<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UtilisateurSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([
            'email' => Str::random(10).'@ynov.com',// Seed une adresse mail radom
            'nom' => Str::random(10),//seed un nom random
            'pseudo' => Str::random(10),//idem pour le psudo
            'mdp' => Hash::make('mdp'),//idem pour le mdp mais va le hash 
        ]);
    }
}