<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Date;
use Carbon\Carbon;
class FichierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attachment')->insert([
            'titre'=> Str::random(10), // On seed un titre dans la table task
            'nom_du_fichier'=> Str::random(10), // On seed une description dans la table task
        ]);
    }
}
