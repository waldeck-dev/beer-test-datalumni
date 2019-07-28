<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Carbon;
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
        if ( $page > 12 ) {
            abort(404);
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
            'previous_page' => $page <= 1 ? 'disabled' : $page - 1,
            'next_page' => $page >= 12 ? 'disabled' : $page + 1
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

    public function random() {
        $random_id = random_int(1,160);
        return redirect()->action('HomeController@show', ['id' => $random_id]);
    }

    // Add new comment
    public function commentNew($beer_id, $comment_id=NULL) {
        // Determine HTTP method (POST = new comment, PUT = update comment)
        $method = 'POST';
        if( $comment_id ) {
            Comment::find($comment_id) ? $method = 'PUT' : abort(404);
        }

        // Get beer info from API
        $body = $this->client
                     ->request('GET', $this->beer_endpoint . 'beers/' . $beer_id)
                     ->getBody();
        $beer = json_decode($body);

        return view('beer.form_comment')->with([
            'method' => $method,
            'beer_id' => $beer_id,
            'beer_name' => $beer[0]->name,
            'comment' => Comment::find($comment_id)
        ]);
    }

    // Store new comment in DB
    public function commentPost(Request $request, $beer_id, $comment_id=NULL) {
        $this-> validate($request, [
            'body' => 'required'
        ]);

        // Create Comment (POST) or update existing Comment (PUT)
        if ( $request->_method == 'POST' ) {
            $comment = new Comment;
            $comment->created_at = Carbon::now();
        } else {
            if ( Comment::find($comment_id) ) {
                $comment = Comment::find($comment_id);
                $comment->updated_at = Carbon::now();
            } else {
                abort(404);
            }
        }

        $comment->body = $request->input('body');
        $comment->user_id = Auth::id();
        $comment->beer_id = $beer_id;
        $comment->beer_name = $request->input('beer_name');
        $comment->save();

        return redirect()->to(route('detail', [$beer_id]).'#comments');
    }

    // Delete comment
    public function commentDelete($beer_id, $comment_id) {
        $comment = Comment::find($comment_id);
        if ( $comment ) {
            // Make sure this is user's comment
            if ( $comment->user_id == Auth::id() ) {
                $comment->delete();
                return redirect()->to(route('detail', [$beer_id]).'#comments');
            } else {
                abort(403, $comment->user_id . ' ' . Auth::id() . ' ' . $comment_id );
            }
        } else {
            abort(404);
        }
    }
}
