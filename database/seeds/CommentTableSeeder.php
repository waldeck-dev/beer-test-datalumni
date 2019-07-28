<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use function GuzzleHttp\json_decode;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $client = new \GuzzleHttp\Client();
        $beer_names = [];
        foreach ([1,2] as $page) {
            $body = $client->request('GET', 'https://api.punkapi.com/v2/beers', [
                'query' => [
                    'page' => $page,
                    'per_page' => 80
                ]
            ])->getBody();
            $data = json_decode($body);

            foreach ($data as $beer) {
                $beer_names[$beer->id] = $beer->name;
            }
        }

        $count = 0;
        while ($count < 400) {
            $beer_id = random_int(1,160);

            DB::table('comments')->insert([
                'body' => $this->random_comment(random_int(10,80)),
                'user_id' => random_int(1,12),
                'beer_id' => $beer_id,
                'beer_name' => $beer_names[$beer_id],
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
