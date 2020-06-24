<?php

use Illuminate\Database\Seeder;

use App\Color;

class colorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Color::create([
            'name_color' => 'Noir',
        ]);
        
        Color::create([
            'name_color' => 'Gris',
        ]);
        
        Color::create([
            'name_color' => 'Blanc',
        ]);
        
        Color::create([
            'name_color' => 'Vert',
        ]);
        
        Color::create([
            'name_color' => 'Bleu',
        ]);
        
        Color::create([
            'name_color' => 'Orange',
        ]);
        
        Color::create([
            'name_color' => 'Rouge',
        ]);
    }
}
