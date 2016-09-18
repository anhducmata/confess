<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Like;
use Faker\Factory as faker;

class LikesTableSeeder extends Seeder
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
  			$Like = Like::create([
            'user_id'   => $faker->numberBetween($min = 0, $max = 99),
            'status_id' => $faker->numberBetween($min = 0, $max = 99)
    		]);
			}
    }
}
