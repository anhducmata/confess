<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Status;
use Faker\Factory as faker;

class StatusTableSeeder extends Seeder
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
  			$status = Status::create([
            'body'    => $faker->text,
            'user_id' => $faker->numberBetween($min = 0, $max = 99)
    		]);
			}
    }
}
