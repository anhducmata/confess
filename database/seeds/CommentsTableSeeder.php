<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Comment;
use Faker\Factory as faker;

class CommentsTableSeeder extends Seeder
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
  			$comment = Comment::create([
            'body'      => $faker->text,
            'user_id'   => $faker->numberBetween($min = 0, $max = 99),
            'status_id' => $faker->numberBetween($min = 0, $max = 99)
    		]);
			}
    }
}
