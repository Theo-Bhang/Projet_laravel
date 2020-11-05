<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Date;
use Carbon\Carbon;
class TacheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('task')->insert([
            'titre'=> Str::random(10), // On seed un titre dans la table task
            'description'=> Str::random(10), // On seed une description dans la table task
            'date_de_publication'=> Carbon::create('2000', '01', '01'), // On seed une date dans la table task
        ]);
    }
}
