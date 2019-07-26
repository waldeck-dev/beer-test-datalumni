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
    }
}
