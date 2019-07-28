@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>New Comment</h3>
        <h4>Tell us what you thin of <strong>{{ $beer_name }}</strong></h4>
        <hr>
        <form
            action="@if( $method == 'POST' ){{ route('post_comment', [$beer_id]) }}@else{{ route('put_comment', [$beer_id, $comment->id]) }}@endif"
            method="POST"
        >
        @csrf
            @include('inc.messages')
            <div class="form-group">
                <label for="body">Your Comment</label>
                <textarea
                    name="body" id="body"
                    rows="10" placeholder="Type your comment here"
                    class="form-control"
                    >@if ($comment) {{ $comment->body }} @endif</textarea>
            </div>
            <input type="hidden" name="beer_name" value="{{ $beer_name }}">
            <input type="hidden" name="_method" value="{{ $method }}">
            <input type="submit" value="Post comment" class="btn btn-primary">
            <a href="{{ route('detail', [$beer_id]) }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
