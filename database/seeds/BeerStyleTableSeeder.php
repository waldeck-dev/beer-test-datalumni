<?php

use Illuminate\Database\Seeder;

class BeerStyleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Data from : https://www.thebeerstore.ca/beer-101/beer-types/
     */
    public function run()
    {
        DB::table('beer_styles')->insert(['name' => 'Amber']);
        DB::table('beer_styles')->insert(['name' => 'Blonde']);
        DB::table('beer_styles')->insert(['name' => 'Brown']);
        DB::table('beer_styles')->insert(['name' => 'Cream']);
        DB::table('beer_styles')->insert(['name' => 'Dark']);
        DB::table('beer_styles')->insert(['name' => 'Pale']);
        DB::table('beer_styles')->insert(['name' => 'Strong']);
        DB::table('beer_styles')->insert(['name' => 'Wheat']);
        DB::table('beer_styles')->insert(['name' => 'Red']);
        DB::table('beer_styles')->insert(['name' => 'India Pale Ale']);
        DB::table('beer_styles')->insert(['name' => 'Lime']);
        DB::table('beer_styles')->insert(['name' => 'Pilsner']);
        DB::table('beer_styles')->insert(['name' => 'Golden']);
        DB::table('beer_styles')->insert(['name' => 'Fruit']);
        DB::table('beer_styles')->insert(['name' => 'Honney']);
    }
}
