<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Friend;
use Faker\Factory as faker;

class FriendsTableSeeder extends Seeder
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
  			$Friend = Friend::create([
			'requester_id' => $faker->numberBetween($min = 0, $max = 99),
			'requested_id' => $faker->numberBetween($min = 0, $max = 99)
    		]);
			}
    }
}
