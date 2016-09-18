<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\ReplyCommentLike;
use Faker\Factory as faker;

class ReplyCommentLikesTableSeeder extends Seeder
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
  			$ReplyCommentLike = ReplyCommentLike::create([
            'user_id'    => $faker->numberBetween($min = 0, $max = 99),
            'comment_id' => $faker->numberBetween($min = 0, $max = 99)
    		]);
			}
    }
}
