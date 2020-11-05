<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Carbon\Carbon;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array =["todo","ongoing","done"];
        DB::table('task')->insert([
            'title'=> Str::random(10), // On seed un titre dans la table task
            'description'=> Str::random(10), // On seed une description dans la table task
            'due_date'=> Carbon::create('2000', '01', '01'), // On seed une date dans la table task
            'state' =>Arr::random($array),
        ]);
    }
}
