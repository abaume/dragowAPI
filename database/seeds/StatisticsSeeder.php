<?php

use App\Statistics;
use Illuminate\Database\Seeder;

class StatisticsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 5; $i++) {
            $faker = \Faker\Factory::create();
            Statistics::create([
                'name'      => $faker->unique()->word,
                'feature'   => $faker->word
            ]);
        }
    }
}
