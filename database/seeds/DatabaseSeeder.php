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
            userSeeder::class,
            ProductsTableSeeder::class,
            colorSeeder::class,
            materialSeeder::class,
            outilsSeeder::class,
        ]);
    }
}
