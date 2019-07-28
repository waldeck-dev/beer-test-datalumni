<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use function GuzzleHttp\json_decode;

use App\Comment;

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
        // Handle pagination
        $page = 1;
        if ( Input::get('page') ){
            $page = Input::get('page');
        }

        // Request data from API
        $body = $this->client
                     ->request('GET', $this->beer_endpoint . 'beers', [
                            'query' => [
                                'page' => $page,
                                'per_page' => 12
                            ]
                       ])
                     ->getBody();
        $data = json_decode($body);


        return view('home')->with([
            'beers' => $data,
            'current_page' => $page,
            'previous_page' => $page == 1 ? 'disabled' : $page - 1,
            'next_page' => $page + 1
        ]);
    }

    public function show($id) {
        $body = $this->client
                     ->request('GET', $this->beer_endpoint . 'beers/' . $id)
                     ->getBody();
        $beer = json_decode($body);

        $comments = Comment::where('beer_id', $id)->get();

        return view('beer.details')->with(
            compact('beer', 'comments')
        );
    }
}
