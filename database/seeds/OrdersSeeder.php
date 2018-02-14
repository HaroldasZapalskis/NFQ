<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->delete();

        $faker = Faker\Factory::create();

        for($i = 0; $i < 50; $i++) {
            App\Orders::create([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->email,
                'address' => $faker->address,
                'product_id' => '1'
            ]);
        }
    }
}
