<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function GuzzleHttp\json_decode;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->client = new \GuzzleHttp\Client();
        $this->beer_endpoint = 'https://api.punkapi.com/v2/';
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $body = $this->client
                      ->request('GET', $this->beer_endpoint . 'beers', [
                            'query' => ['per_page' => 12]
                       ])
                      ->getBody();
        $data = json_decode($body);

        return view('home')->with('beers', $data);
    }

    public function show($id) {
        $body = $this->client
                     ->request('GET', $this->beer_endpoint . 'beers/' . $id)
                     ->getBody();
        $data = json_decode($body);

        return view('beer.details')->with('beer', $data);
    }
}
