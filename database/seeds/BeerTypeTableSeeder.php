<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BeerTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     *  Data from : https://www.thebeerstore.ca/beer-101/beer-types/
     */
    public function run()
    {
        DB::table('beer_types')->insert([
            'name' => 'Ale',
            'description' => 'Ales are full-bodied with hints of fruit or spice and a hoppy finish. They’re also known to quench a mean thirst.',
        ]);
        DB::table('beer_types')->insert([
            'name' => 'Lager',
            'description' => 'Lager, the beer style almost everyone’s familiar with, is known for its crispness and refreshing finish.',
        ]);
        DB::table('beer_types')->insert([
            'name' => 'Malt',
            'description' => 'Sweet tooth? Malts, often containing notes of caramel, toffee, and nuts, are dark and sweet in flavour.',
        ]);
        DB::table('beer_types')->insert([
            'name' => 'Stout',
            'description' => 'Stouts, owing their dark colour to roasted barley, add depth and character to your glass. If in doubt, stout it out.',
        ]);
    }
}
