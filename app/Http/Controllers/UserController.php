<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\BeerType;
use App\BeerStyle;


class UserController extends Controller
{

    // Show user profile edit form
    public function edit()
    {
        $user = $this->getUser();
        return view('user.profile')->with([
            'user' => $user,
            'types' => BeerType::all(),
            'styles' => BeerStyle::all(),
        ]);
    }

    // Update user profile in storage.
    public function update(Request $request)
    {
        $this->validate($request, [
            'email' => 'email',
        ]);

        $user = $this->getUser();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->favourite_type = $request->input('beer-type');
        $user->favourite_style = $request->input('beer-style');
        $user->save();

        return redirect()->route('profile');
    }

    public function getUser() {
        $user_id = Auth::id();
        $user = User::find($user_id);
        return $user;
    }
}
