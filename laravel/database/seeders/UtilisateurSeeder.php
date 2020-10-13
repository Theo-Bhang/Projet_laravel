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
        DB::table('utilisateurs')->insert([
            'email' => Str::random(10).'@gmail.com',
            'nom' => Str::random(10),
            'pseudo' => Str::random(10),
            'mdp' => Hash::make('mdp'),
        ]);
    }
}