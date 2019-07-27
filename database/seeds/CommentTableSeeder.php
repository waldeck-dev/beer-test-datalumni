<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 0;
        while ($count < 500) {

            DB::table('comments')->insert([
                'body' => $this->random_comment(random_int(10,80)),
                'user_id' => random_int(1,12),
                'beer_id' => random_int(1,200),
                'created_at' => date_create("2019-07-27"),
            ]);

            $count++;
        }
    }

    private function random_comment($length) {
        $lorem = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin fringilla laoreet ipsum, ac tempor lacus tincidunt nec. Donec imperdiet lorem sit amet pulvinar volutpat. Donec fringilla magna est, at molestie arcu fringilla a. Cras vestibulum lectus quis volutpat eleifend. Donec at arcu ex. Sed quis rhoncus est. Curabitur in massa ac nunc tincidunt pretium et in dui. Mauris luctus turpis ac magna rhoncus, id pellentesque orci ultrices. Nam sed cursus neque. Fusce vestibulum ex odio, ut varius nibh dapibus ac. Praesent a semper dolor. Pellentesque iaculis laoreet facilisis. Donec finibus viverra tortor sed luctus. Vivamus eget facilisis nulla. Nunc id molestie odio, sit amet imperdiet leo. Donec vitae orci lectus. Nulla aliquam sit amet leo nec lacinia. Aliquam a lorem ante. Sed lectus lorem, pretium eu justo sed, gravida volutpat orci. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed vitae mauris porttitor, ullamcorper tellus sed, efficitur enim. Curabitur sit amet quam ac augue mollis faucibus. Maecenas in purus semper, sollicitudin mi a, finibus felis. Pellentesque dapibus enim nec viverra tincidunt.';
        $lorem = explode(' ', $lorem);

        $words = [];
        while ( count($words) < $length ) {
            array_push($words, $lorem[random_int(0, count($lorem)-1)]);
        }

        return implode(' ', $words);
    }
}
