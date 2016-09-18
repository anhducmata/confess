<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\CommentLike;
use Faker\Factory as faker;

class CommentLikesTableSeeder extends Seeder
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
  			$CommentLike = CommentLike::create([
            'user_id'    => $faker->numberBetween($min = 0, $max = 99),
            'comment_id' => $faker->numberBetween($min = 0, $max = 99)
    		]);
			}
    }
}
