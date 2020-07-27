<?php

use App\Outil;
use Illuminate\Database\Seeder;

class outilsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Outil::create([
            'name_outil' => 'Imprimante 3D',
        ]);
        Outil::create([
            'name_outil' => 'Découpeuse Laser',
        ]);
    }
}
