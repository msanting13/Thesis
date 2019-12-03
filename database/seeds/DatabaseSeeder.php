<?php

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
        $this->call([
            CategoryTableSeeder::class,
            AdminTableSeeder::class,
            ExamineeSeeder::class,
            SchoolYearSeeder::class,
        ]);
    }
}
