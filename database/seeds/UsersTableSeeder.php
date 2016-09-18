<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\User;
use Faker\Factory as faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create();

        for ($i=0; $i < 100; $i++) { 
            $user = User::create([
            'name'     => $faker->name,
            'password' => Hash::make($faker->word),
            'email'    => $faker->email
            ]);
        }

    }
}
