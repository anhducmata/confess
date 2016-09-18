<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Message;
use Faker\Factory as faker;

class MessagesTableSeeder extends Seeder
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
  			$Message = Message::create([
            'sender_id'   => $faker->numberBetween($min = 0, $max = 99),
            'receiver_id' => $faker->numberBetween($min = 0, $max = 99),
            'body'        => $faker->text,
            'status'      => $faker->numberBetween($min = 0, $max = 1 ),
    		]);
			}
    }
}
