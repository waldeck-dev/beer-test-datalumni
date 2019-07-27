@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3>Beer details</h3>
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
            <div class="card">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Cras justo odio</li>
                    <li class="list-group-item">Dapibus ac facilisis in</li>
                    <li class="list-group-item">Vestibulum at eros</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
