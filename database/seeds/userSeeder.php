<?php

use Illuminate\Database\Seeder;
use App\User;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'firstname'=>'Maxime',
            'lastname'=>'Vives',
            'email'=>'hastagmaxime@gmail.com',
            'password'=> Hash::make('hwtd83dj'),
            'ID_type'=>'1',
            'admin'=>'1',
        ]);

    }
}
