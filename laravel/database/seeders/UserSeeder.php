<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => Str::random(10).'@ynov.com',// Seed une adresse mail radom
            'name' => Str::random(10),//seed un nom random
            'username' => Str::random(10),//idem pour le psudo
            'password' => Hash::make('password'),//idem pour le mdp mais va le hash 
        ]);
    }
}