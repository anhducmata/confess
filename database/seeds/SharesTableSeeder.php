<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Share;
use Faker\Factory as faker;

class SharesTableSeeder extends Seeder
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
  			$Share = Share::create([
            'user_id'   => $faker->numberBetween($min = 0, $max = 99),
            'status_id' => $faker->numberBetween($min = 0, $max = 99)
    		]);
			}
    }
}
