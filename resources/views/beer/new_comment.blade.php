@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>New Comment</h3>
        <h4>Tell us what you thin of <strong>{{ $beer_name }}</strong></h4>
        <hr>
        <form action="{{ route('post_comment', [$beer_id]) }}" method="POST">
            @csrf
            @include('inc.messages')
            <div class="form-group">
                <label for="body">Your Comment</label>
                <textarea
                    name="body" id="body"
                    rows="10" placeholder="Type your comment here"
                    class="form-control"></textarea>
            </div>
            <input type="hidden" name="beer_name" value="{{ $beer_name }}">
            <input type="submit" value="Post comment" class="btn btn-primary">
        </form>
    </div>
@endsection
