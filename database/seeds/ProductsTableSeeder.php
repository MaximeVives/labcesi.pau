<?php
use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Product::create([
            'name_product' => 'Visière CESI',
            'description' => 'Une visière créée par le Fablab. Cette visière permet une protection contre les postillons. La taille est unique.',
            'url_pic' => 'visiere2.jpg',
            'quantity' => '1'
        ]);

        Product::create([
            'name_product' => 'Stylet CESI',
            'description' => 'Un stylet créé par le Fablab. Ce stylet permet à celui qui l\'utilise de ne pas être en contact direct avec des boutons type terminal de paiment ou ascenseur. La taille est unique.',
            'url_pic' => 'visiere3.png',
            'quantity' => '1'
        ]);
    }
}
