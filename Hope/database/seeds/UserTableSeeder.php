<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
       foreach (range(1,100) as $index) {
       		App\User::create([
       			'name' => $faker->name,
       			'password' =>bcrypt('123456'),
       			'email' => $faker->email,
       			'token'=> str_random(80),
       		]);
       }
    }
}
