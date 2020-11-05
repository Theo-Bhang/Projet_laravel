<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CategorieSeeder extends Seeder
{
    /**
     * 
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert([
            'nom' => Str::random(10) // On seed un nom dans la table categories
        ]);
    }
}