@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card-columns">
            @foreach ($beers as $beer)
                <div class="card">
                    <div class="row no-gutters">
                        <div class="col-md-4" style="padding:1em;">
                            <a href="/{{ $beer->id }}">
                                <img src="{{ $beer->image_url }}" alt="{{ $beer->name }}" class="card-img">
                            </a>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="/beers/{{ $beer->id }}">
                                        <strong>{{ $beer->name }}</strong>
                                    </a>
                                </h5>
                                <p class="card-text">
                                    <small class="text-muted">First brewed in {{ $beer->first_brewed }}</small>
                                </p>
                                <h6 class="card-title">
                                    <em>{{ $beer->tagline }}</em>
                                </h6>
                                <p class="card-text">
                                    {{ $beer->description }}
                                </p>
                                <p class="card-text">
                                    <svg class="i-msg" viewBox="0 0 32 32" width="16" height="16" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3">
                                        <path d="M2 4 L30 4 30 22 16 22 8 29 8 22 2 22 Z"></path>
                                    </svg>
                                    <a href="/beers/{{ $beer->id }}#comments">
                                        <span style="margin-left:0.5em;">3 comments</span>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
