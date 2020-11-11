<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(TaskSeeder::class);
        $this->call(FichierSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(BoardSeeder::class);
    }
}
