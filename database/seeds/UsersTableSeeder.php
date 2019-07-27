<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Tryphon Tournesol',
            'email' => 'tryphon.tournesol@caramail.fr',
            'password' => bcrypt('12345678'),
        ]);
        DB::table('users')->insert([
            'name' => 'Archibald Haddock',
            'email' => 'a.haddock@mail.co',
            'password' => bcrypt('12345678'),
        ]);
        DB::table('users')->insert([
            'name' => 'Bianca Castafiore',
            'email' => 'b.castafiore@mail.co',
            'password' => bcrypt('12345678'),
        ]);
        DB::table('users')->insert([
            'name' => 'Séraphin Lampion',
            'email' => 's.lampion@mail.co',
            'password' => bcrypt('12345678'),
        ]);
        DB::table('users')->insert([
            'name' => 'Hyppolite Bergamotte',
            'email' => 'h.bergamotte@mail.co',
            'password' => bcrypt('12345678'),
        ]);
        DB::table('users')->insert([
            'name' => 'Allan Thompson',
            'email' => 'a.thompson@mail.co',
            'password' => bcrypt('12345678'),
        ]);
    }
}
