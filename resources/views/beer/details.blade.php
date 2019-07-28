@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex justify-content-between" style="margin-bottom:0.5em;">
                <h3>Beer details</h3>
                <a href="/beers?page={{ app('request')->input('page') }}" class="btn btn-secondary">
                    <svg class="i-caret-left" viewBox="0 0 32 32" width="16" height="16" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                        <path d="M22 30 L6 16 22 2 Z"></path>
                    </svg>
                    Go back
                </a>
            </div>
            @foreach($beer as $b)
            <div class="card">
                <div class="row no-gutters">
                    <div class="col-md-4" style="padding:2em;">
                        <img src="{{ $b->image_url }}" alt="{{ $b->name }}" class="card-img">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">
                                <strong>{{ $b->name }}</strong>
                            </h5>
                            <p class="card-text">
                                <small class="text-muted">First brewed in {{ $b->first_brewed }}</small>
                            </p>
                            <h6 class="card-title">
                                <em>{{ $b->tagline }}</em>
                            </h6>
                            <p class="card-text">
                                {{ $b->description }}
                            </p>
                            <div class="alert alert-info">
                                <h5 class="alert-heading">Brewer Tips</h5>
                                <em>{{ $b->brewers_tips }}</em>
                            </div>
                            <hr>
                            <div>
                                <p><strong>Food Pairing :</strong></p>
                                <em>We recommend this beer served with:</em>
                                <ul class="list-group list-group-item-light">
                                    @foreach( $b->food_pairing as $food )
                                        <li class="list-group-item">{{ $food }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="row justify-content-center" style="margin-top:2em">
        <div class="col-md-8">
            <h3 id="comments">Comments</h3>
            <p>Tell us what you think of <strong>{{ $beer[0]->name }}</strong>?</p>
            @if( count($comments) > 0 )
                @foreach( $comments as $comment )
                <div class="card" style="margin-bottom:0.5em;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $comment->getUser()->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Posted on {{ $comment->created_at->format('d-m-Y') }}</h6>
                        <p class="card-text">{{ $comment->body }}</p>
                        @if( $comment->user_id == Auth::user()->id )
                            <a href="" class="card-link">Edit comment</a>
                        @endif
                    </div>
                </div>
                @endforeach
            @else
                <div class="card bg-light mb-3">
                    <div class="card-body">
                        <h5 class="card-title">No comments</h5>
                        <p class="card-text">Be the first person to share your thoughts about <strong>{{ $beer[0]->name }}</strong></p>
                    </div>
                </div>
            @endif
            <a href="" class="btn btn-success">Add new comment</a>
        </div>
    </div>
</div>
@endsection
