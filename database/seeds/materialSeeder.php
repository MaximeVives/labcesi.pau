<?php

use Illuminate\Database\Seeder;

use App\Material;

class materialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Material::create([
            'name_material' => 'PLA',
        ]);            
    }
}
