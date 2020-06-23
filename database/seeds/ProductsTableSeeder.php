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
            'description' => 'Une visière créé par le Fablab.',
            'url_pic' => 'visiere-cesi.png',
            'quantity' => '1'
        ]);

        Product::create([
            'name_product' => 'Stylet CESI',
            'description' => 'Un stylet créé par le Fablab',
            'url_pic' => 'stylet-cesi.png',
            'quantity' => '10'
        ]);
    }
}
