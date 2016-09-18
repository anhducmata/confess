<?php

use Illuminate\Database\Seeder;
use Faker\Factory as faker;
use App\ReplyComment;

class ReplyCommentsTableSeeder extends Seeder
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
  			$ReplyComment = ReplyComment::create([
            'body'       => $faker->text,
            'user_id'    => $faker->numberBetween($min = 0, $max = 99),
            'comment_id' => $faker->numberBetween($min = 0, $max = 99)
    		]);
			}       
    }
}
