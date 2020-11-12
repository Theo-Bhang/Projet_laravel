<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class FichierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attachments')->insert([
            'file'=> Str::random(10), // On seed un titre dans la table task
            'filename'=> Str::random(10), // On seed une description dans la table task
            'type'=> Str::random(10), // On seed un type dans la table task
            'size'=> rand(10,1000), // On seed une size dans la table task
        ]);
    }
}
