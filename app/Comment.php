<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // Get comment's user model
    public function getUser() {
        return User::where('id', $this->user_id)->first();
    }

    // Count comments for a given beer_id
    public static function countComments($beer_id) {
        return Comment::where('beer_id', $beer_id)->count();
    }
}
