<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->delete();

        App\Product::create([
            'author' => 'Haroldas Zapalskis',
            'book_name' => 'Read before sleep',
            'pages_number' => '100',
            'year' => '1995',
            'id' => '1',
            'status' => '1',
            'price' => '19.99',
            'image' => 'a'
        ]);
    }
}
