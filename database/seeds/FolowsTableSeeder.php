<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Folow;
use Faker\Factory as faker;

class FolowsTableSeeder extends Seeder
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
  			$Folow = Folow::create([
			'requester_id' => $faker->numberBetween($min = 0, $max = 99),
			'folower_id'   => $faker->numberBetween($min = 0, $max = 99)
    		]);
			}
    }
}
